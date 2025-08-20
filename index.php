<?php
// إعدادات الاتصال بقاعدة البيانات (بناءً على ملف con.php الخاص بك)
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "info"; // اسم قاعدة البيانات

try {
    $pdo = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch(PDOException $e) {
    die("Connection failed: " . $e->getMessage());
}

// معالجة إضافة مستخدم جديد
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['add_user'])) {
    $name = trim($_POST['name']);
    $age = (int)$_POST['age'];
    
    if (!empty($name) && $age > 0) {
        $stmt = $pdo->prepare("INSERT INTO user (name, age) VALUES (?, ?)");
        $stmt->execute([$name, $age]);
        header("Location: " . $_SERVER['PHP_SELF']);
        exit();
    }
}

// معالجة تغيير الحالة
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['toggle_status'])) {
    $user_id = (int)$_POST['user_id'];
    $current_status = (int)$_POST['current_status'];
    $new_status = $current_status == 0 ? 1 : 0;
    
    $stmt = $pdo->prepare("UPDATE user SET status = ? WHERE id = ?");
    $stmt->execute([$new_status, $user_id]);
    header("Location: " . $_SERVER['PHP_SELF']);
    exit();
}

// جلب جميع المستخدمين
$users = $pdo->query("SELECT * FROM user ORDER BY id")->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>إدارة المستخدمين</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        
        body {
            font-family: 'Arial', sans-serif;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            min-height: 100vh;
            padding: 20px;
        }
        
        .container {
            max-width: 1200px;
            margin: 0 auto;
            background: white;
            border-radius: 15px;
            box-shadow: 0 20px 40px rgba(0,0,0,0.1);
            overflow: hidden;
        }
        
        .header {
            background: linear-gradient(45deg, #667eea, #764ba2);
            color: white;
            padding: 30px;
            text-align: center;
        }
        
        .logo {
            font-size: 2.5em;
            font-weight: bold;
            margin-bottom: 10px;
        }
        
        .subtitle {
            font-size: 1.2em;
            opacity: 0.9;
        }
        
        .content {
            padding: 40px;
        }
        
        .form-section {
            background: #f8f9fa;
            padding: 30px;
            border-radius: 10px;
            margin-bottom: 40px;
            border-left: 5px solid #667eea;
        }
        
        .form-title {
            font-size: 1.5em;
            margin-bottom: 20px;
            color: #333;
        }
        
        .form-row {
            display: flex;
            gap: 15px;
            align-items: end;
            flex-wrap: wrap;
        }
        
        .input-group {
            flex: 1;
            min-width: 200px;
        }
        
        label {
            display: block;
            margin-bottom: 8px;
            font-weight: bold;
            color: #555;
        }
        
        input[type="text"],
        input[type="number"] {
            width: 100%;
            padding: 12px;
            border: 2px solid #ddd;
            border-radius: 8px;
            font-size: 16px;
            transition: border-color 0.3s;
        }
        
        input[type="text"]:focus,
        input[type="number"]:focus {
            outline: none;
            border-color: #667eea;
        }
        
        .submit-btn {
            background: linear-gradient(45deg, #667eea, #764ba2);
            color: white;
            border: none;
            padding: 12px 30px;
            border-radius: 8px;
            font-size: 16px;
            cursor: pointer;
            transition: transform 0.2s;
        }
        
        .submit-btn:hover {
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(102, 126, 234, 0.4);
        }
        
        .table-section {
            margin-top: 30px;
        }
        
        .table-title {
            font-size: 1.5em;
            margin-bottom: 20px;
            color: #333;
        }
        
        .table-container {
            background: white;
            border-radius: 10px;
            overflow: hidden;
            box-shadow: 0 5px 15px rgba(0,0,0,0.08);
        }
        
        table {
            width: 100%;
            border-collapse: collapse;
        }
        
        th {
            background: linear-gradient(45deg, #667eea, #764ba2);
            color: white;
            padding: 15px;
            text-align: center;
            font-weight: bold;
        }
        
        td {
            padding: 15px;
            text-align: center;
            border-bottom: 1px solid #eee;
        }
        
        tr:hover {
            background-color: #f8f9fa;
        }
        
        .status-badge {
            padding: 6px 12px;
            border-radius: 20px;
            font-size: 0.9em;
            font-weight: bold;
        }
        
        .status-active {
            background-color: #28a745;
            color: white;
        }
        
        .status-inactive {
            background-color: #6c757d;
            color: white;
        }
        
        .toggle-btn {
            background: #17a2b8;
            color: white;
            border: none;
            padding: 8px 16px;
            border-radius: 5px;
            cursor: pointer;
            font-size: 14px;
            transition: all 0.3s;
        }
        
        .toggle-btn:hover {
            background: #138496;
            transform: scale(1.05);
        }
        
        .empty-state {
            text-align: center;
            padding: 40px;
            color: #666;
            font-size: 1.1em;
        }
        
        @media (max-width: 768px) {
            .form-row {
                flex-direction: column;
            }
            
            .input-group {
                min-width: 100%;
            }
            
            table {
                font-size: 14px;
            }
            
            th, td {
                padding: 10px 5px;
            }
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <div class="logo"></div>
            <div class="subtitle">نظام إدارة المستخدمين</div>
        </div>
        
        <div class="content">
            <!-- نموذج إضافة مستخدم جديد -->
            <div class="form-section">
                <h2 class="form-title">إضافة مستخدم جديد</h2>
                <form method="POST">
                    <div class="form-row">
                        <div class="input-group">
                            <label for="name">الاسم:</label>
                            <input type="text" id="name" name="name" required>
                        </div>
                        <div class="input-group">
                            <label for="age">العمر:</label>
                            <input type="number" id="age" name="age" min="1" max="120" required>
                        </div>
                        <div class="input-group">
                            <button type="submit" name="add_user" class="submit-btn">إضافة</button>
                        </div>
                    </div>
                </form>
            </div>
            
            <!-- جدول عرض المستخدمين -->
            <div class="table-section">
                <h2 class="table-title">قائمة المستخدمين</h2>
                <div class="table-container">
                    <?php if (empty($users)): ?>
                        <div class="empty-state">
                            لا توجد بيانات مستخدمين حالياً. قم بإضافة مستخدم جديد!
                        </div>
                    <?php else: ?>
                        <table>
                            <thead>
                                <tr>
                                    <th>الرقم</th>
                                    <th>الاسم</th>
                                    <th>العمر</th>
                                    <th>الحالة</th>
                                    <th>الإجراء</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($users as $user): ?>
                                <tr>
                                    <td><?= htmlspecialchars($user['id']) ?></td>
                                    <td><?= htmlspecialchars($user['name']) ?></td>
                                    <td><?= htmlspecialchars($user['age']) ?></td>
                                    <td>
                                        <span class="status-badge <?= $user['status'] == 1 ? 'status-active' : 'status-inactive' ?>">
                                            <?= $user['status'] == 1 ? 'نشط' : 'غير نشط' ?>
                                        </span>
                                    </td>
                                    <td>
                                        <form method="POST" style="display: inline;">
                                            <input type="hidden" name="user_id" value="<?= $user['id'] ?>">
                                            <input type="hidden" name="current_status" value="<?= $user['status'] ?>">
                                            <button type="submit" name="toggle_status" class="toggle-btn">
                                                <?= $user['status'] == 1 ? 'إلغاء التفعيل' : 'تفعيل' ?>
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
</body>
</html>