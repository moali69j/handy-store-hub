import { BrowserRouter as Router, Routes, Route, Link } from 'react-router-dom';
import Login from './pages/Login';
import CreateStore from './pages/CreateStore';

function Dashboard() {
    return (
        <div style={{ padding: '20px' }}>
            <h1>لوحة تحكم الآدمن</h1>
            <nav>
                <Link to="/create-store">
                    <button style={{ padding: '10px 20px', cursor: 'pointer' }}>
                        ➕ إنشاء متجر جديد
                    </button>
                </Link>
            </nav>
        </div>
    );
}

function App() {
    return (
        <Router>
            <Routes>
                <Route path="/" element={<Login />} />
                <Route path="/dashboard" element={<Dashboard />} />
                <Route path="/create-store" element={<CreateStore />} />
            </Routes>
        </Router>
    );
}

export default App;