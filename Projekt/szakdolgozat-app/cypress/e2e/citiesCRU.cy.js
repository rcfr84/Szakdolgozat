describe('template spec', () => {
  it('passes', () => {
    
    cy.visit('http://127.0.0.1:8000/counties/create')

    cy.get('input[id=email]').type('admin@gmail.com')
    cy.get('input[id=password]').type('password')
    cy.contains('Bejelentkezés').click()

    cy.visit('http://127.0.0.1:8000/cities/county/12')

    cy.visit('http://127.0.0.1:8000/cities/1637')
    cy.get('input[id=name]').clear()
    cy.get('input[id=name]').type('Példa város')
    cy.contains('Módosítás').click()

  })
})