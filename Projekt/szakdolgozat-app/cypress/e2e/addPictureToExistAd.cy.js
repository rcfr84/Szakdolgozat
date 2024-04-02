describe('template spec', () => {
  it('passes', () => {
    cy.visit('http://127.0.0.1:8000/login')
    
    cy.get('input[id=email]').type('toth.jozsef@gmail.com')
    cy.get('input[id=password]').type('password')
    cy.contains('Bejelentkezés').click()

    cy.visit('http://127.0.0.1:8000/advertisements/own')
    cy.get('td.px-4.py-2 a').eq(0).click();
    
    cy.contains('Új kép hozzáadása').click()
    const picture1 = 'background_image.png'
    cy.get('input[id=pictures1]').attachFile(picture1)
    
    cy.contains('Hozzáadás').click()
    cy.get('.bg-green-500').should('be.visible').contains('Sikeres módosítás!').should('have.length', 1);

    cy.contains('Módosítás').click()
    cy.get('.bg-green-500').should('be.visible').contains('Sikeres módosítás!').should('have.length', 1);
  })
})