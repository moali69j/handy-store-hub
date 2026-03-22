import { useState } from 'react';
import api from '../api/axios';

function CreateStore() {
    const [formData, setFormData] = useState({ name: '', email: '', password: '', store_name: '' });

    const handleSubmit = async (e) => {
        e.preventDefault();
        const token = localStorage.getItem('token');
        try {
            await api.post('/admin/create-store', formData, {
                headers: { Authorization: `Bearer ${token}` }
            });
            alert('تم إنشاء المتجر بنجاح!');
        // eslint-disable-next-line no-unused-vars
        } catch (error) {
            alert('فشل الإنشاء، تأكد من الصلاحيات والبيانات');
        }
    };

    return (
        <form onSubmit={handleSubmit} style={{padding: '20px'}}>
            <h3>إضافة تاجر ومتجر جديد</h3>
            <input placeholder="اسم التاجر" onChange={e => setFormData({...formData, name: e.target.value})} /><br/>
            <input placeholder="إيميل التاجر" onChange={e => setFormData({...formData, email: e.target.value})} /><br/>
            <input type="password" placeholder="كلمة المرور" onChange={e => setFormData({...formData, password: e.target.value})} /><br/>
            <input placeholder="اسم المتجر" onChange={e => setFormData({...formData, store_name: e.target.value})} /><br/>
            <button type="submit">إنشاء المتجر</button>
        </form>
    );
}

export default CreateStore;