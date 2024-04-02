describe('template spec', () => {
  it('passes', () => {
    cy.visit('http://127.0.0.1:8000/login')
    
    cy.get('input[id=email]').type('toth.jozsef@gmail.com')
    cy.get('input[id=password]').type('password')
    cy.contains('Bejelentkezés').click()

    cy.visit('http://127.0.0.1:8000/advertisements/4/show')
    cy.contains('Üzenet küldése').click()
    cy.get('textarea[name="message"]').type('Megvan még az asztal?')
    cy.contains('Küldés').click()
    cy.get('.bg-green-500').should('be.visible').contains('Sikeres küldés!').should('have.length', 1);
    

    cy.visit('http://127.0.0.1:8000/advertisements/4/show')
    cy.contains('Üzenet küldése').click()
    cy.contains('Küldés').click()
    cy.get('.text-red-800').should('be.visible').contains('Nem lehet üres.').should('have.length', 1);

  })
})