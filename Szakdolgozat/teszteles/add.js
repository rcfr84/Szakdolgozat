describe('template spec', () => {
    it('passes', () => {
  
      cy.visit('http://127.0.0.1:8000/advertisements/create')
  
      cy.get('input[id=email]').type('toth.jozsef@gmail.com')
      cy.get('input[id=password]').type('password')
      cy.contains('Bejelentkezés').click()
  
      cy.get('select[id=countySelect]').select('Heves vármegye')
      cy.get('select[id=citySelect]').select('Eger')
      cy.get('select[id=category]').select('Autó')
  
      const picture1 = 'background_image.png'
      const picture2 = 'background.jpg'
      cy.get('input[id=pictures1]').attachFile(picture1)
      cy.get('input[id=pictures2]').attachFile(picture2)
  
      cy.get('input[id=title]').type('Eladó BMW 320d')
      cy.get('input[id=price]').type('10000000')
      cy.get('label[for=description]').next('textarea').type('Eladó egy BMW 320d, 2015-ös évjárat, 200.000 km');
      cy.get('input[id=mobile_number').type('06301234567')
  
      cy.contains('Hozzáadás').click()
      
      cy.location('href').should('eq', 'http://127.0.0.1:8000/advertisements/own')
      cy.get('.bg-green-500').should('be.visible').contains('Sikeres hozzáadás!').should('have.length', 1);
      
    })
  })