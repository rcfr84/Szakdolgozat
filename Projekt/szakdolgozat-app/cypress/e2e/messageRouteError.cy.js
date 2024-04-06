describe('template spec', () => {
  it('passes', () => {
    cy.visit('http://127.0.0.1:8000/login')
    cy.get('input[id=email]').type('admin@gmail.com')
    cy.get('input[id=password]').type('password')
    cy.contains('Bejelentkezés').click()

    cy.visit('http://127.0.0.1:8000/messages/2/get/1')
    cy.location('href').should('eq', 'http://127.0.0.1:8000/messages/2/get/1')

    cy.visit('http://127.0.0.1:8000/messages/30/get/1')
    cy.location('href').should('eq', 'http://127.0.0.1:8000/messages/get')
    cy.get('.bg-red-500').should('be.visible').contains('Nincs ilyen beszélgetés!').should('have.length', 1);

    cy.visit('http://127.0.0.1:8000/messages/-1/get/1')
    cy.location('href').should('eq', 'http://127.0.0.1:8000/messages/get')
    cy.get('.bg-red-500').should('be.visible').contains('Nincs ilyen beszélgetés!').should('have.length', 1);

    cy.visit('http://127.0.0.1:8000/messages/2/get/-1')
    cy.location('href').should('eq', 'http://127.0.0.1:8000/messages/get')
    cy.get('.bg-red-500').should('be.visible').contains('Nincs ilyen beszélgetés!').should('have.length', 1);

    cy.visit('http://127.0.0.1:8000/messages/2/get/100000')
    cy.location('href').should('eq', 'http://127.0.0.1:8000/messages/get')
    cy.get('.bg-red-500').should('be.visible').contains('Nincs ilyen beszélgetés!').should('have.length', 1);
  })
})