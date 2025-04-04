// ***********************************************
// This example commands.js shows you how to
// create various custom commands and overwrite
// existing commands.
//
// For more comprehensive examples of custom
// commands please read more here:
// https://on.cypress.io/custom-commands
// ***********************************************
//
//
// -- This is a parent command --
// Cypress.Commands.add('login', (email, password) => { ... })
//
//
// -- This is a child command --
// Cypress.Commands.add('drag', { prevSubject: 'element'}, (subject, options) => { ... })
//
//
// -- This is a dual command --
// Cypress.Commands.add('dismiss', { prevSubject: 'optional'}, (subject, options) => { ... })
//
//
// -- This will overwrite an existing command --
// Cypress.Commands.overwrite('visit', (originalFn, url, options) => { ... })

Cypress.Commands.add('guiLoginUser', (
    email = Cypress.env('user_email'), 
    password = Cypress.env('user_password')
) => {
    cy.visit('/login')
    
    cy.get('[data-qa-selector="email"]').type(email)
    cy.get('[data-qa-selector="password"]').type(password)
    cy.get('button[type="submit"]').click()
})

Cypress.Commands.add('guiCreateTaskboard', (taskboard) => {
    cy.get('[data-qa-selector="create-taskboard"]').click()

    cy.get('#input-title').type(taskboard.title)
    cy.get('textarea[name="description"]').type(taskboard.description)

    cy.get('[data-qa-selector="send-form-taskboard"]').click()
})

Cypress.Commands.add('guiCreateTaskInTaskboard', (task) => {
    cy.visit('/task-board')

    cy.get(`[data-qa-selector="${task.taskboard.title}"]`).click()

    cy.get('button[arial-label="Adicionar tarefa"]').click()

    cy.get('#input-date-start').type(task.datestart)
    cy.get('#input-date-end').type(task.dateend)
    cy.get('#input-title').type(task.title)
    cy.get('#input-description').type(task.description)

    cy.get('[data-qa-selector="create-new-task"]').click()
})

Cypress.Commands.add('guiCreateTaskboardWithoutData', () => {
    cy.get('[data-qa-selector="create-taskboard"]').click()
    cy.get('[data-qa-selector="send-form-taskboard"]').click()
})

Cypress.Commands.add('guiTryLoginEmptyUser', () => {
    cy.visit('/login')
    cy.get('button[type="submit"]').click()
})
