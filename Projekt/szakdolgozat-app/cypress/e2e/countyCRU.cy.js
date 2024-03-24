describe('template spec', () => {
  it('passes', () => {
    cy.visit('http://127.0.0.1:8000/counties/create')

    cy.get('input[id=email]').type('admin@gmail.com')
    cy.get('input[id=password]').type('password')
    cy.contains('Bejelentkezés').click()

    cy.get('input[id=name]').type('Példa megye')
    cy.contains('Hozzáadás').click()

    cy.visit('http://127.0.0.1:8000/counties/20')
    cy.get('input[id=name]').clear()
    cy.get('input[id=name]').type('Példa megye módosítva')
    cy.contains('Módosítás').click()
   
  })
})