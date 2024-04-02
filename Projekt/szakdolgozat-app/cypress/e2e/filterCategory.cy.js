describe('template spec', () => {
  it('passes', () => {
    cy.visit('http://127.0.0.1:8000/login')
    
    cy.get('input[id=email]').type('toth.jozsef@gmail.com')
    cy.get('input[id=password]').type('password')
    cy.contains('Bejelentkezés').click()

    cy.visit('http://127.0.0.1:8000/advertisements')
    cy.get('input[type="checkbox"]').check();
    cy.get('input[type="checkbox"]').should('be.checked');

    cy.get('select[id=category]').select('Háztartási gép')
    cy.contains('Alkalmaz').click()
  })
})