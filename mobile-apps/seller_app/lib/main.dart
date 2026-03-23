import 'package:flutter/material.dart';
import 'screens/login_screen.dart';
import 'screens/home_screen.dart';

void main() {
  // تضمن هذه الدالة عمل الإضافات (مثل SharedPreferences) بشكل صحيح قبل تشغيل التطبيق
  WidgetsFlutterBinding.ensureInitialized();
  runApp(const SellerApp());
}

class SellerApp extends StatelessWidget {
  const SellerApp({super.key});

  @override
  Widget build(BuildContext context) {
    return MaterialApp(
      title: 'Handy Store - Seller',
      debugShowCheckedModeBanner: false,

      // تنسيق عام للتطبيق (Theme) ليعطي طابع الحرف اليدوية
      theme: ThemeData(
        primarySwatch: Colors.brown,
        useMaterial3: true,
        inputDecorationTheme: const InputDecorationTheme(
          border: OutlineInputBorder(),
          filled: true,
          fillColor: Color(0xFFFDF5E6), // لون ورقي خفيف
        ),
      ),

      // الصفحة التي يبدأ بها التطبيق
      initialRoute: '/',

      // جدول الروابط (Routes Table)
      routes: {
        '/': (context) => const LoginScreen(),
        '/home': (context) => const HomeScreen(),
        // '/add-product': (context) => const AddProductScreen(), // سنضيفها لاحقاً
      },
    );
  }
}
