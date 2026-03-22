import { useState } from 'react';
import api from '../api/axios';
import { useNavigate } from 'react-router-dom';
function Login() {
    const [email, setEmail] = useState('');
    const [password, setPassword] = useState('');
    const navigate = useNavigate();

    const handleLogin = async (e) => {
        e.preventDefault();
        try {
            const response = await api.post('/login', { email, password });
            const { access_token, user } = response.data;

            if (user.role !== 'admin') {
                alert('عذراً، هذه اللوحة للآدمن فقط!');
                return;
            }

            localStorage.setItem('token', access_token);
            navigate('/dashboard');
            // هنا سنقوم لاحقاً بالتوجيه لصفحة الداشبورد
        // eslint-disable-next-line no-unused-vars
        } catch (error) {
            alert('خطأ في البيانات، حاول مجدداً');
        }
    };

    return (
        <div style={{ padding: '50px' }}>
            <h2>تسجيل دخول الآدمن</h2>
            <form onSubmit={handleLogin}>
                <input type="email" placeholder="الإيميل" onChange={e => setEmail(e.target.value)} /><br/>
                <input type="password" placeholder="الباسورد" onChange={e => setPassword(e.target.value)} /><br/>
                <button type="submit">دخول</button>
            </form>
        </div>
    );
}

export default Login;