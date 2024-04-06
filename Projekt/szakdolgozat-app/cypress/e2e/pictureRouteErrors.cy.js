describe('template spec', () => {
  it('passes', () => {
    cy.visit('http://127.0.0.1:8000/login')
    cy.get('input[id=email]').type('toth.jozsef@gmail.com')
    cy.get('input[id=password]').type('password')
    cy.contains('Bejelentkezés').click()

    cy.visit('http://127.0.0.1:8000/pictures/create/25')
    cy.location('href').should('eq', 'http://127.0.0.1:8000/pictures/create/25')

    cy.visit('http://127.0.0.1:8000/pictures/create/100')
    cy.location('href').should('eq', 'http://127.0.0.1:8000/pictures/create/25')
    cy.get('.bg-red-500').should('be.visible').contains('Nincsen ilyen hirdetés!').should('have.length', 1);

    cy.visit('http://127.0.0.1:8000/pictures/create/-1')
    cy.location('href').should('eq', 'http://127.0.0.1:8000/pictures/create/25')
    cy.get('.bg-red-500').should('be.visible').contains('Nincsen ilyen hirdetés!').should('have.length', 1);

    cy.visit('http://127.0.0.1:8000/pictures/create/3')
    cy.location('href').should('eq', 'http://127.0.0.1:8000/pictures/create/3')
    cy.get('.text-red-800').should('be.visible').contains('Nincsen megfelelő jogosultságod a kívánt művelethez!').should('have.length', 1);
  })
})