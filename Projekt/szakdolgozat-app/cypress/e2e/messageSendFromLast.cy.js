describe('template spec', () => {
  it('passes', () => {
    cy.visit('http://127.0.0.1:8000/login')
    
    cy.get('input[id=email]').type('toth.jozsef@gmail.com')
    cy.get('input[id=password]').type('password')
    cy.contains('Bejelentkezés').click()

    cy.visit('http://127.0.0.1:8000/messages/get')
    cy.get('td.px-4.py-2 a').eq(2).click();
    cy.contains('Üzenet küldése').click()
    cy.get('textarea[name="message"]').type('Kár sajnos.')
    cy.contains('Küldés').click()
    cy.get('.bg-green-500').should('be.visible').contains('Sikeres küldés!').should('have.length', 1);


    
  })
})