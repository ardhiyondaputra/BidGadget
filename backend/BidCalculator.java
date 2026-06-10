public class BidCalculator {

    public String calculateBidStatus(
            double bidAmount,
            double currentHighest,
            int timeRemaining,
            int userReputation) {

        if (timeRemaining > 0) {
            if (bidAmount > currentHighest) {
                if (userReputation < 5) {
                    if (bidAmount > currentHighest * 1.5) {
                        return "REJECTED_SUSPICIOUS_ACTIVITY";
                    } else {
                        return "ACCEPTED_PENDING_MANUAL_REVIEW";
                    }
                } else {
                    if (timeRemaining < 60) {
                        return "ACCEPTED_AND_TIME_EXTENDED";
                    } else {
                        return "ACCEPTED_NORMAL";
                    }
                }
            } else {
                if (bidAmount <= 0) {
                    return "REJECTED_INVALID_AMOUNT";
                } else {
                    return "REJECTED_BID_TOO_LOW";
                }
            }
        } else {
            return "REJECTED_AUCTION_CLOSED";
        }
    }
}