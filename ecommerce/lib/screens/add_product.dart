import 'dart:convert';
import 'dart:ffi';

import 'package:ecommerce/screens/homepage.dart';
import 'package:flutter/material.dart';
import 'package:http/http.dart' as http;

class AddProduct extends StatelessWidget {
  final _formKey = GlobalKey<FormState>();
  TextEditingController _nameController = TextEditingController();
  TextEditingController _descriptionController = TextEditingController();
  TextEditingController _unitController = TextEditingController();
  TextEditingController _priceController = TextEditingController();
  TextEditingController _imageController = TextEditingController();
  
  Future saveProduct() async{
    final response = 
      await http.post(Uri.parse("http://localhost:8000/api/products/store"), body: {
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
        title: Text('Add Product'),
      ),
      body: Form(
        key: _formKey,
        child: Column(
          children: [
            TextFormField(
              controller: _nameController,
              decoration: InputDecoration(labelText: "Name"),
              validator: (value) {
                if (value == null || value.isEmpty){
                  return "Please enter product name";
                }
                return null;
              },
            ),
            TextFormField(
              controller: _descriptionController,
              decoration: InputDecoration(labelText: "Description"),
              validator: (value) {
                if (value == null || value.isEmpty){
                  return "Please enter description";
                }
                return null;
              },
            ),
            TextFormField(
              controller: _unitController,
              decoration: InputDecoration(labelText: "Unit"),
              validator: (value) {
                if (value == null || value.isEmpty){
                  return "Please enter unit";
                }
                return null;
              },
            ),
            TextFormField(
              controller: _priceController,
              decoration: InputDecoration(labelText: "Price"),
              validator: (value) {
                if (value == null || value.isEmpty){
                  return "Please enter price";
                }
                return null;
              },
            ),
            TextFormField(
              controller: _imageController,
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
                  saveProduct().then((value){
                    Navigator.push(context, MaterialPageRoute(builder: (context) => HomePage()));
                    ScaffoldMessenger.of(context).showSnackBar(SnackBar(content: Text('Product Saved!')));
                  });
                  
                }
              }, 
              child: Text('Save')
            )
          ],
        ),
      ),
    );
  }
}