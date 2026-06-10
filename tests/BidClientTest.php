<?php

use PHPUnit\Framework\TestCase;

require_once __DIR__ . '/../frontend/BidClient.php';

class BidClientTest extends TestCase
{
    public function testPayloadCreation()
    {
        $client = new BidClient();

        $payload = $client->createPayload(
            101,
            1,
            30000
        );

        $expected =
            '{"auction_id":101,"user_id":1,"bid_amount":30000}';

        $this->assertEquals(
            $expected,
            $payload
        );
    }

    public function testAuctionIdIsInteger()
    {
        $client = new BidClient();

        $payload = $client->createPayload(
            "101",
            1,
            30000
        );

        $data = json_decode($payload, true);

        $this->assertIsInt(
            $data['auction_id']
        );
    }

    public function testBidAmountIsFloat()
    {
        $client = new BidClient();

        $payload = $client->createPayload(
            101,
            1,
            "30000.50"
        );

        $data = json_decode($payload, true);

        $this->assertIsFloat(
            $data['bid_amount']
        );
    }
}