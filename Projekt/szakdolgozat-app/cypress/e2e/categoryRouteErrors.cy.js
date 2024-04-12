describe('template spec', () => {
  it('passes', () => {
    cy.visit('http://127.0.0.1:8000/login')
    cy.get('input[id=email]').type('admin@gmail.com')
    cy.get('input[id=password]').type('password')
    cy.contains('Bejelentkezés').click()

    cy.visit('http://127.0.0.1:8000/categories/1')
    cy.location('href').should('eq', 'http://127.0.0.1:8000/categories/1')

    cy.visit('http://127.0.0.1:8000/categories/100')
    cy.location('href').should('eq', 'http://127.0.0.1:8000/allCategories')
    cy.get('.bg-red-500').should('be.visible').contains('Nincsen ilyen kategória!').should('have.length', 1);

    cy.visit('http://127.0.0.1:8000/categories/-1')
    cy.location('href').should('eq', 'http://127.0.0.1:8000/allCategories')
    cy.get('.bg-red-500').should('be.visible').contains('Nincsen ilyen kategória!').should('have.length', 1);

    cy.contains('Kategória műveletek').click()
    cy.location('href').should('eq', 'http://127.0.0.1:8000/categories/action')

    cy.visit('http://127.0.0.1:8000/categories/100/edit')
    cy.location('href').should('eq', 'http://127.0.0.1:8000/categories/action')
    cy.get('.bg-red-500').should('be.visible').contains('Nincsen ilyen kategória!').should('have.length', 1);

    cy.visit('http://127.0.0.1:8000/categories/-1/edit')
    cy.location('href').should('eq', 'http://127.0.0.1:8000/categories/action')
    cy.get('.bg-red-500').should('be.visible').contains('Nincsen ilyen kategória!').should('have.length', 1);
  })
})