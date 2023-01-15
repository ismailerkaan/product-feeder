
# Product Feeder System

E-ticaret sistemelerinine istenilen veri türünde ürün listelemesi yapar.

## API Kullanımı

#### Route

```http
  GET /feed/{provider}/{type}
```

#### Örnek Route
```http
  GET /feed/goole/json
```

| Parametre | Tip     | Açıklama                |
| :-------- | :------- | :------------------------- |
| `provider` | `string` | **Gerekli**. Servis sağlayıcısı. örn:goole/facebook/cimri |
| `type` | `string` | **Gerekli**. Listeleme Formatı örn: json/xml. |



  