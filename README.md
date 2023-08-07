# walmart API

the endpoint of the Walmart API to post products using API is:

```
https://marketplace.walmartapis.com/v3/items
```

This endpoint allows you to create new items on Walmart. The request body must be a JSON object that contains the following information:

## Item Information

- **itemId**: The unique identifier for the item.
- **itemName**: The name of the item.
- **itemDescription**: The description of the item.
- **itemPrice**: The price of the item.
- **itemQuantity**: The quantity of the item in stock.
- **itemCategory**: The category of the item.
- **itemImages**: An array of images for the item.

For more information, please see the Walmart Marketplace API documentation: https://developer.walmart.com/doc/us/mp/us-mp-items/.

Here is an example of a request body that you can use to post a product to Walmart:

## Item Information

```json
{
  "itemId": "1234567890",
  "itemName": "Walmart T-Shirt",
  "itemDescription": "This is a comfortable and stylish T-Shirt from Walmart.",
  "itemPrice": 19.99,
  "itemQuantity": 100,
  "itemCategory": "Apparel",
  "itemImages": [
    {
      "url": "https://www.walmart.com/images/product/1234567890/large/walmart-t-shirt.jpg"
    }
  ]
}
```
## Sending the Request

Once you have created the request body, you can send the request to the endpoint using the appropriate HTTP method. In this case, you would use the `POST` method.

For example, you could use the following `curl` command to send the request:

```bash
curl -X POST \
  -H "Content-Type: application/json" \
  -d '{
    "itemId": "1234567890",
    "itemName": "Walmart T-Shirt",
    "itemDescription": "This is a comfortable and stylish T-Shirt from Walmart.",
    "itemPrice": 19.99,
    "itemQuantity": 100,
    "itemCategory": "Apparel",
    "itemImages": [
      {
        "url": "https://www.walmart.com/images/product/1234567890/large/walmart-t-shirt.jpg"
      }
    ]
  }' \
  https://marketplace.walmartapis.com/v3/items
```

If the request is successful, you will receive a response from Walmart. The response will contain the status of the request and any other relevant information.

