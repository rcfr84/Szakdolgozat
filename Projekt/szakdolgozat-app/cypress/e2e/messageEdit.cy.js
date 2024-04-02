describe('template spec', () => {
  it('passes', () => {
    cy.visit('http://127.0.0.1:8000/login')
    
    cy.get('input[id=email]').type('toth.jozsef@gmail.com')
    cy.get('input[id=password]').type('password')
    cy.contains('Bejelentkezés').click()

    cy.visit('http://127.0.0.1:8000/messages/get')
    cy.get('td.px-4.py-2 a').eq(0).click();
    cy.get('td.px-4.py-2 a').eq(0).click();
    cy.get('input[name="message"]').clear()
    cy.get('input[name="message"]').type('Megváltoztva.')
    cy.contains('Módosítás').click()
    cy.get('.bg-green-500').should('be.visible').contains('Sikeres módosítás!').should('have.length', 1);

    cy.get('td.px-4.py-2 a').eq(1).click();
    cy.get('input[name="message"]').clear()
    cy.contains('Módosítás').click()
    cy.get('.text-red-800').should('be.visible').contains('Nem lehet üres.').should('have.length', 1);

  })
})