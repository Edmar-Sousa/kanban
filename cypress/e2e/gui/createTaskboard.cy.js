import { faker } from "@faker-js/faker"

describe('Test create a taskboard', () => {
    const taskboard = {
        title: faker.lorem.words({ min: 1, max: 4 }),
        description: faker.lorem.words({ min: 5, max: 10 })
    }
    
    beforeEach(() => {
        cy.guiLoginUser()
    })


    it('Test create task board', () => {
        cy.guiCreateTaskboard(taskboard)
        cy.get('[data-qa-selector="form-alert"]').should('be.visible')
    })


    it('Test try create task board without data', () => {
        cy.guiCreateTaskboardWithoutData()
        cy.get('#input-title ~ p').eq(0).should('have.text', 'O campo tarefa é obrigatorio.')
        cy.get('textarea[name="description"] ~ p').should('have.text', 'O campo descrição é obrigatorio.')
    })
})
