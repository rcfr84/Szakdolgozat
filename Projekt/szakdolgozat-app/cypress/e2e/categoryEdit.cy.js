describe('template spec', () => {
  it('passes', () => {
    cy.visit('http://127.0.0.1:8000/login')
    
    cy.get('input[id=email]').type('admin@gmail.com')
    cy.get('input[id=password]').type('password')
    cy.contains('Bejelentkezés').click()

    cy.visit('http://127.0.0.1:8000/allCategories')
    cy.contains('Kategória műveletek').click()

    cy.visit('http://127.0.0.1:8000/categories/26/edit')
    cy.get('input[id=name]').clear()
    cy.get('input[id=name]').type('pelda 2')
    cy.contains('Módosítás').click()

    cy.visit('http://127.0.0.1:8000/categories/26/edit')
    cy.get('input[id=name]').clear()
    cy.contains('Módosítás').click()
    cy.get('.text-red-800').should('be.visible').contains('Nem lehet üres.').should('have.length', 1);

    cy.get('input[id=name]').type('pelda 2')
    cy.contains('Módosítás').click()
    cy.get('.text-red-800').should('be.visible').contains('Már létezik ilyen.').should('have.length', 1);

  })
})