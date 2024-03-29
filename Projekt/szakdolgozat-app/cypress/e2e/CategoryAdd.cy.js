describe('template spec', () => {
  it('passes', () => {
    cy.visit('http://127.0.0.1:8000/login')
    
    cy.get('input[id=email]').type('admin@gmail.com')
    cy.get('input[id=password]').type('password')
    cy.contains('Bejelentkezés').click()

    cy.visit('http://127.0.0.1:8000/allCategories')
    cy.contains('Kategória műveletek').click()

    cy.contains('Új kategória hozzáadása').click()
    cy.get('input[id=name]').type('pelda')

    cy.contains('Hozzáadás').click()

    cy.contains('Új kategória hozzáadása').click()
    cy.contains('Hozzáadás').click()
    cy.get('.text-red-800').should('be.visible').contains('Nem lehet üres.').should('have.length', 1);
    cy.get('input[id=name]').type('pelda')
    cy.contains('Hozzáadás').click()
    cy.get('.text-red-800').should('be.visible').contains('Már létezik ilyen.').should('have.length', 1);

    
  })
})