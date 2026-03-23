import 'package:flutter/material.dart';

class HomeScreen extends StatelessWidget {
  const HomeScreen({super.key});

  @override
  Widget build(BuildContext context) {
    return Scaffold(
      appBar: AppBar(
        title: const Text("لوحة تحكم التاجر"),
        actions: [
          IconButton(
            onPressed: () => Navigator.pop(context),
            icon: const Icon(Icons.logout),
          ),
        ],
      ),
      body: Center(
        child: Column(
          mainAxisAlignment: MainAxisAlignment.center,
          children: [
            const Icon(
              Icons.store_mall_directory,
              size: 80,
              color: Colors.brown,
            ),
            const SizedBox(height: 20),
            const Text(
              "مرحباً بك في متجرك الافتراضي",
              style: TextStyle(fontSize: 18),
            ),
            const SizedBox(height: 40),
            ElevatedButton.icon(
              onPressed: () {
                /* سنبرمج إضافة منتج لاحقاً */
              },
              icon: const Icon(Icons.add_a_photo),
              label: const Text("إضافة منتج جديد"),
            ),
          ],
        ),
      ),
    );
  }
}
