import { faker } from "@faker-js/faker"

describe('Test login page', () => {
  it('Login with correct data', () => {
    const userEmail = Cypress.env('user_email')
    const userPassword = Cypress.env('user_password')

    cy.guiLoginUser(userEmail, userPassword)

    cy.get('header h1').should('have.text', 'Boards')
  })


  it('Try Login with error data', () => {
    const userEmail = faker.internet.email()
    const userPassword = faker.string.alpha(10)

    cy.guiLoginUser(userEmail, userPassword)

    cy.get('[data-qa-selector="email"] ~ p').should('have.text', 'O email informado não foi encontrado.')
  })

  it('Try login without data', () => {
    cy.guiTryLoginEmptyUser()

    cy.get('[data-qa-selector="email"] ~ p').should('have.text', 'Este campo é obrigatorio.')
    cy.get('[data-qa-selector="password"] ~ p').should('have.text', 'Este campo é obrigatorio.')
  })
})