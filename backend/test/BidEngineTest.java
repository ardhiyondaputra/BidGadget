public class BidEngineTest {

    public static void main(String[] args) {

        BidEngine.BidHandler handler =
                new BidEngine.BidHandler();

        String result =
                handler.calculateBidStatus(
                        30000,
                        25000,
                        45,
                        8
                );

        System.out.println(result);
    }
}