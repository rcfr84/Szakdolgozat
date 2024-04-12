describe('template spec', () => {
  it('passes', () => {
    cy.visit('http://127.0.0.1:8000/login')
    cy.get('input[id=email]').type('admin@gmail.com')
    cy.get('input[id=password]').type('password')
    cy.contains('Bejelentkezés').click()

    cy.visit('http://127.0.0.1:8000/advertisements/1/edit')
    cy.contains('Vármegye és város módosítása').click()

    cy.get('.bg-red-50').contains('Figyelmeztetés!').should('be.visible');
  })
})