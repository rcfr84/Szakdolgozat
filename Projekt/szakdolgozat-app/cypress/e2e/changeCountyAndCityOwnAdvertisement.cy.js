describe('template spec', () => {
  it('passes', () => {
    cy.visit('http://127.0.0.1:8000/login')
    
    cy.get('input[id=email]').type('toth.jozsef@gmail.com')
    cy.get('input[id=password]').type('password')
    cy.contains('Bejelentkezés').click()

    cy.visit('http://127.0.0.1:8000/advertisements/own')
    cy.get('td.px-4.py-2 a').eq(0).click();
    
    cy.contains('Vármegye és város módosítása').click()
    cy.get('select[id=countySelect]').select('Nógrád vármegye')
    cy.get('select[id=citySelect]').select('Tar')
    cy.contains('Módosítás').click()
    cy.get('.bg-green-500').should('be.visible').contains('Sikeres módosítás!').should('have.length', 1);

    cy.contains('Módosítás').click()
    cy.get('.bg-green-500').should('be.visible').contains('Sikeres módosítás!').should('have.length', 1);


  })
})