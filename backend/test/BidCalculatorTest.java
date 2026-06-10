import org.junit.jupiter.api.Test;
import static org.junit.jupiter.api.Assertions.*;

public class BidCalculatorTest {

    BidCalculator calc = new BidCalculator();

    @Test
    void testAuctionClosed() {
        assertEquals(
                "REJECTED_AUCTION_CLOSED",
                calc.calculateBidStatus(
                        30000,
                        25000,
                        0,
                        8
                )
        );
    }

    @Test
    void testInvalidAmount() {
        assertEquals(
                "REJECTED_INVALID_AMOUNT",
                calc.calculateBidStatus(
                        -10,
                        25000,
                        45,
                        8
                )
        );
    }

    @Test
    void testBidTooLow() {
        assertEquals(
                "REJECTED_BID_TOO_LOW",
                calc.calculateBidStatus(
                        20000,
                        25000,
                        45,
                        8
                )
        );
    }

    @Test
    void testSuspiciousActivity() {
        assertEquals(
                "REJECTED_SUSPICIOUS_ACTIVITY",
                calc.calculateBidStatus(
                        50000,
                        25000,
                        45,
                        2
                )
        );
    }

    @Test
    void testPendingManualReview() {
        assertEquals(
                "ACCEPTED_PENDING_MANUAL_REVIEW",
                calc.calculateBidStatus(
                        30000,
                        25000,
                        45,
                        2
                )
        );
    }

    @Test
    void testAcceptedAndTimeExtended() {
        assertEquals(
                "ACCEPTED_AND_TIME_EXTENDED",
                calc.calculateBidStatus(
                        30000,
                        25000,
                        45,
                        8
                )
        );
    }

    @Test
    void testAcceptedNormal() {
        assertEquals(
                "ACCEPTED_NORMAL",
                calc.calculateBidStatus(
                        30000,
                        25000,
                        100,
                        8
                )
        );
    }
}