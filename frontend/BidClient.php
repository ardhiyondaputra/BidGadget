<?php

class BidClient
{
    public function createPayload(
        $auctionId,
        $userId,
        $bidAmount
    ) {
        return json_encode([
            "auction_id" => (int)$auctionId,
            "user_id" => (int)$userId,
            "bid_amount" => (float)$bidAmount
        ]);
    }
}