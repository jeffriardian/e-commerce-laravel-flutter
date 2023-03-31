import 'dart:convert';
import 'dart:ffi';

import 'package:ecommerce/screens/homepage.dart';
import 'package:flutter/material.dart';
import 'package:http/http.dart' as http;

class EditProduct extends StatelessWidget {
  final Map product;

  EditProduct({required this.product});

  final _formKey = GlobalKey<FormState>();
  TextEditingController _nameController = TextEditingController();
  TextEditingController _descriptionController = TextEditingController();
  TextEditingController _unitController = TextEditingController();
  TextEditingController _priceController = TextEditingController();
  TextEditingController _imageController = TextEditingController();
  
  Future updateProduct() async{
    final response = 
      await http.put(Uri.parse("http://localhost:8000/api/products/update/" + product['id'].toString()), body: {
      "category_id": "1",
      "name": _nameController.text,
      "description": _descriptionController.text,
      "units": _unitController.text,
      "price": _priceController.text,
      "image": _imageController.text
    });
    print(response.body);
    return json.decode(response.body);
  }

  @override
  Widget build(BuildContext context) {
    return Scaffold(
      appBar: AppBar(
        title: Text('Edit Product'),
      ),
      body: Form(
        key: _formKey,
        child: Column(
          children: [
            TextFormField(
              controller: _nameController..text = product['name'],
              decoration: InputDecoration(labelText: "Name"),
              validator: (value) {
                if (value == null || value.isEmpty){
                  return "Please enter product name";
                }
                return null;
              },
            ),
            TextFormField(
              controller: _descriptionController..text = product['description'],
              decoration: InputDecoration(labelText: "Description"),
              validator: (value) {
                if (value == null || value.isEmpty){
                  return "Please enter description";
                }
                return null;
              },
            ),
            TextFormField(
              controller: _unitController..text = product['units'].toString(),
              decoration: InputDecoration(labelText: "Unit"),
              validator: (value) {
                if (value == null || value.isEmpty){
                  return "Please enter unit";
                }
                return null;
              },
            ),
            TextFormField(
              controller: _priceController..text = product['price'].toString(),
              decoration: InputDecoration(labelText: "Price"),
              validator: (value) {
                if (value == null || value.isEmpty){
                  return "Please enter price";
                }
                return null;
              },
            ),
            TextFormField(
              controller: _imageController..text = product['image'],
              decoration: InputDecoration(labelText: "Image"),
              validator: (value) {
                if (value == null || value.isEmpty){
                  return "Please enter image";
                }
                return null;
              },
            ),
            SizedBox(
              height: 20,
            ),
            ElevatedButton(
              onPressed: (){
                if (_formKey.currentState!.validate()){
                  updateProduct().then((value){
                    Navigator.push(context, MaterialPageRoute(builder: (context) => HomePage()));
                    ScaffoldMessenger.of(context).showSnackBar(SnackBar(content: Text('Product Updated!')));
                  });
                  
                }
              }, 
              child: Text('Update')
            )
          ],
        ),
      ),
    );
  }
}