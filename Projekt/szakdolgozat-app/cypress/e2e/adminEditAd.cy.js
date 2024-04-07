describe('template spec', () => {
  it('passes', () => {
    cy.visit('http://127.0.0.1:8000/login')
    cy.get('input[id=email]').type('admin@gmail.com')
    cy.get('input[id=password]').type('password')
    cy.contains('Bejelentkezés').click()

    cy.visit('http://127.0.0.1:8000/advertisements/1/edit')

    cy.get('input[id=title]').clear()
    cy.get('input[id=title]').type('Audi 400')
    cy.get('input[id=price]').clear()
    cy.get('input[id=price]').type('1000000')
    cy.get('#description').clear()
    cy.get('#description').type('Nagyon jó autó')
    cy.get('input[id=mobile_number]').clear()
    cy.get('input[id=mobile_number]').type('06305567801')

    cy.contains('Módosítás').click()

    cy.location('href').should('eq', 'http://127.0.0.1:8000/advertisements')
    cy.get('.bg-green-500').should('be.visible').contains('Sikeres módosítás!').should('have.length', 1);

  })
})