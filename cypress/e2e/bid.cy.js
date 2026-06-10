describe('BidGadget System Testing', () => {

    it('Submit valid bid', () => {

        cy.visit(
            'http://localhost:8001/bid.php?item=MacBook%20Pro%20M3%20Max&auction_id=101'
        )

        cy.get('[data-testid="input-bid-amount"]')
            .type('30000')

        cy.get('[data-testid="btn-submit-bid"]')
            .click()

        cy.get('[data-testid="status-message"]')
            .should(
                'contain',
                'ACCEPTED_AND_TIME_EXTENDED'
            )

    })

})

describe('BidGadget System Testing', () => {

    it('Submit valid bid', () => {

        cy.visit(
            'http://localhost:8001/bid.php?item=MacBook%20Pro%20M3%20Max&auction_id=101'
        )

        cy.get('[data-testid="input-bid-amount"]')
            .type('30000')

        cy.get('[data-testid="btn-submit-bid"]')
            .click()

        cy.get('[data-testid="status-message"]')
            .should(
                'contain',
                'ACCEPTED_AND_TIME_EXTENDED'
            )

    })

    it('Reject empty bid', () => {

        cy.visit(
            'http://localhost:8001/bid.php?item=MacBook%20Pro%20M3%20Max&auction_id=101'
        )

        cy.get('[data-testid="btn-submit-bid"]')
            .click()

        cy.get('[data-testid="error-message"]')
            .should(
                'contain',
                'tidak boleh kosong'
            )

    })

    it('Reject zero bid', () => {

        cy.visit(
            'http://localhost:8001/bid.php?item=MacBook%20Pro%20M3%20Max&auction_id=101'
        )

        cy.get('[data-testid="input-bid-amount"]')
            .type('0')

        cy.get('[data-testid="btn-submit-bid"]')
            .click()

        cy.get('[data-testid="error-message"]')
            .should(
                'contain',
                'lebih besar dari 0'
            )

    })

})