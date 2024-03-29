describe('template spec', () => {
  it('passes', () => {
    cy.visit('http://127.0.0.1:8000/login')
    
    cy.get('input[id=email]').type('toth.jozsef@gmail.com')
    cy.get('input[id=password]').type('password')
    cy.contains('Bejelentkezés').click()

    cy.visit('http://127.0.0.1:8000/advertisements')
    cy.get('input[type="checkbox"]').check();
    cy.get('input[type="checkbox"]').should('be.checked');

    cy.get('input[name="min_price"]').type('1000');
    cy.contains('Alkalmaz').click()
    
    cy.visit('http://127.0.0.1:8000/advertisements')
    cy.get('input[type="checkbox"]').check();
    cy.get('input[type="checkbox"]').should('be.checked');

    cy.get('input[name="max_price"]').type('1000');
    cy.contains('Alkalmaz').click()
    
    cy.visit('http://127.0.0.1:8000/advertisements')

    cy.get('input[type="checkbox"]').check();
    cy.get('input[type="checkbox"]').should('be.checked');

    cy.get('input[name="min_price"]').type('1000');
    cy.get('input[name="max_price"]').type('100000');
    cy.contains('Alkalmaz').click()


  })
})