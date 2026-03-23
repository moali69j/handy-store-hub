import 'package:dio/dio.dart';
import 'package:shared_preferences/shared_preferences.dart';

class ApiClient {
  // تذكر: استخدم IP جهازك الحقيقي لكي يراه الهاتف
  static const String baseUrl = "http://192.168.1.2:8000/api";

  final Dio _dio = Dio(
    BaseOptions(
      baseUrl: baseUrl,
      headers: {
        'Accept': 'application/json',
        'Content-Type': 'application/json',
      },
    ),
  );

  // دالة تسجيل الدخول
  Future<Response> login(String email, String password) async {
    try {
      return await _dio.post(
        '/login',
        data: {'email': email, 'password': password},
      );
    } on DioException catch (e) {
      rethrow; // سنعالج الخطأ في الواجهة (UI)
    }
  }

  // دالة لحفظ التوكن ليبقى المستخدم مسجلاً دخوله
  Future<void> saveToken(String token) async {
    final prefs = await SharedPreferences.getInstance();
    await prefs.setString('token', token);
  }
}
