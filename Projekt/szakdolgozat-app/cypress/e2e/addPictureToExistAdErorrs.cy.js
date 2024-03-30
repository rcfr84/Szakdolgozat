describe('template spec', () => {
  it('passes', () => {
    cy.visit('http://127.0.0.1:8000/login')
    
    cy.get('input[id=email]').type('toth.jozsef@gmail.com')
    cy.get('input[id=password]').type('password')
    cy.contains('Bejelentkezés').click()

    cy.visit('http://127.0.0.1:8000/advertisements/own')
    cy.get('td.px-4.py-2 a').eq(1).click();
    
    cy.contains('Új kép hozzáadása').click()
    const picture1 = 'largeImage.png'
    cy.get('input[id=pictures1]').attachFile(picture1)
    
    cy.contains('Hozzáadás').click()
    cy.get('.text-red-800').should('be.visible').contains('A képek nem jó formátumban vannak vagy nem lehet nagyobbak 10 megabájtnál.').should('have.length', 1);

    const pdf = 'orai_feladat.pdf'
    cy.get('input[id=pictures1]').attachFile(pdf)
    cy.contains('Hozzáadás').click()
    cy.get('.text-red-800').should('be.visible').contains('A képek nem jó formátumban vannak vagy nem lehet nagyobbak 10 megabájtnál.').should('have.length', 1);


   
  })
})