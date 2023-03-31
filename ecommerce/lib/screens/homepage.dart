import 'dart:convert';

import 'package:ecommerce/screens/add_product.dart';
import 'package:ecommerce/screens/product_detail.dart';
import 'package:flutter/material.dart';
import 'package:http/http.dart' as http;

import 'edit_product.dart';

class HomePage extends StatefulWidget {
  const HomePage({
    super.key,
  });

  @override
  State<HomePage> createState() => _HomePageState();
}

class _HomePageState extends State<HomePage> {
  final String url = 'http://localhost:8000/api/products';

  Future getProducts() async{
    var response = await http.get(Uri.parse(url));
    print(json.decode(response.body));
    return json.decode(response.body);
  }

  Future deleteProduct(String productId) async {
    String url = 'http://localhost:8000/api/products/' + productId;

    var response = await http.delete(Uri.parse(url));

    return json.decode(response.body);
  }

  @override
  Widget build(BuildContext context) {
    
    return Scaffold(
      floatingActionButton: FloatingActionButton(
        onPressed: (){
          Navigator.push(context, MaterialPageRoute(builder: (context) => AddProduct()));
        }
      ),
      appBar: AppBar(
        title: Text('Order Online'),
      ),
      body: FutureBuilder(
        future:getProducts(),
        builder:(context,snapshot){
          if (snapshot.hasData){
            return ListView.builder(
              itemCount: snapshot.data['data'].length,
              itemBuilder: (context, index) {
                return Container(
                  height: 180,
                  child: Card(
                    elevation: 5,
                    child: Row(
                      children: [
                        GestureDetector(
                          onTap: (){
                            Navigator.push(context, MaterialPageRoute(builder: (context)=>ProductDetail(product: snapshot.data['data'][index])));
                          },
                          child: Container(
                            padding: EdgeInsets.all(5),
                            height: 120,
                            width: 120,
                            child: Image.network(
                              snapshot.data['data'][index]['image'],
                              fit: BoxFit.cover,
                            ),
                          ),
                        ),
                        Expanded(
                          child: Container(
                            padding: EdgeInsets.all(10.0),
                            child: Column(
                              mainAxisAlignment: MainAxisAlignment.spaceAround,
                              children: [
                                Align(
                                  alignment: Alignment.topLeft,
                                  child: Text(
                                  snapshot.data['data'][index]['name'], 
                                    style: TextStyle(
                                      fontSize: 20.0, 
                                      fontWeight: FontWeight.bold),
                                  ),
                                ),
                                Align(
                                  alignment: Alignment.topLeft,
                                  child: Text(snapshot.data['data'][index]['description'])
                                ),
                                Row(
                                  mainAxisAlignment: MainAxisAlignment.spaceBetween,
                                  children: [
                                    Row(
                                      children: [
                                        GestureDetector(
                                          onTap: (){
                                            Navigator.push(
                                              context, 
                                              MaterialPageRoute(
                                                builder: (context) => 
                                                  EditProduct(
                                                    product: snapshot.data['data'][index],
                                                  )
                                              )
                                            );
                                          }, 
                                          child: Icon(Icons.edit)),
                                        GestureDetector(
                                          onTap: (){
                                            deleteProduct(snapshot.data['data'][index]['id'].toString()).then((value){
                                              setState(() {});
                                              ScaffoldMessenger.of(context).showSnackBar(SnackBar(content: Text('Product Deleted!')));
                                            });
                                          }, 
                                          child: Icon(Icons.delete)),
                                      ],
                                    ),
                                    Text((snapshot.data['data'][index]['price']).toString()),
                                  ],
                                ),
                              ],
                            ),
                          ),
                        ),
                      ],
                    ),
                  ),
                );
            });
          }else{
            return Text('Data not found');
          }
        }
      )
      );
  }
}