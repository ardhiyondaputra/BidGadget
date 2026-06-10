<?php

use PHPUnit\Framework\TestCase;

class BidIntegrationTest extends TestCase
{
    public function testJavaApiReceivesPayload()
    {
        $payload = json_encode([
            "auction_id" => 101,
            "user_id" => 1,
            "bid_amount" => 30000
        ]);

        $ch = curl_init('http://localhost:8000/process-bid');

        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $payload);
        curl_setopt($ch, CURLOPT_HTTPHEADER, [
            'Content-Type: application/json'
        ]);

        $response = curl_exec($ch);

        $statusCode =
            curl_getinfo($ch, CURLINFO_HTTP_CODE);

        curl_close($ch);

        $this->assertEquals(
            200,
            $statusCode
        );

        $data = json_decode(
            $response,
            true
        );

        $this->assertArrayHasKey(
            'status',
            $data
        );
    }

    public function testValidBidReturnsAcceptedStatus()
{
    $payload = json_encode([
        "auction_id" => 101,
        "user_id" => 1,
        "bid_amount" => 30000
    ]);

    $ch = curl_init(
        'http://localhost:8000/process-bid'
    );

    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_POST, true);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $payload);
    curl_setopt($ch, CURLOPT_HTTPHEADER, [
        'Content-Type: application/json'
    ]);

    $response = curl_exec($ch);

    curl_close($ch);

    $data = json_decode(
        $response,
        true
    );

    $this->assertEquals(
        'ACCEPTED_AND_TIME_EXTENDED',
        $data['status']
    );
    }
    public function testInvalidBidReturnsRejectedStatus()
    {
    $payload = json_encode([
        "auction_id" => 101,
        "user_id" => 1,
        "bid_amount" => -100
    ]);

    $ch = curl_init(
        'http://localhost:8000/process-bid'
    );

    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_POST, true);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $payload);
    curl_setopt($ch, CURLOPT_HTTPHEADER, [
        'Content-Type: application/json'
    ]);

    $response = curl_exec($ch);

    curl_close($ch);

    $data = json_decode(
        $response,
        true
    );

    $this->assertEquals(
        'REJECTED_INVALID_AMOUNT',
        $data['status']
    );
}
}