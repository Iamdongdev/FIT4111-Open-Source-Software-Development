<?php
function login($email, $password) {
    $conn = getDbConnection();
    
    try {
        // Validate input
        if (empty($email) || empty($password)) {
            return [
                'success' => false,
                'message' => 'Email và mật khẩu không được để trống'
            ];
        }

        // Prepare statement to prevent SQL injection
        $stmt = $conn->prepare("SELECT * FROM users WHERE email = ?");
        $stmt->bind_param("s", $email);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows === 0) {
            return [
                'success' => false, 
                'message' => 'Email hoặc mật khẩu không đúng'
            ];
        }

        $user = $result->fetch_assoc();
        
        // Verify password
        if (!password_verify($password, $user['password'])) {
            return [
                'success' => false,
                'message' => 'Email hoặc mật khẩu không đúng'
            ];
        }

        // Login successful
        $_SESSION['user_id'] = $user['id'];
        $_SESSION['email'] = $user['email'];
        $_SESSION['role'] = $user['role'];

        return [
            'success' => true,
            'message' => 'Đăng nhập thành công',
            'user' => $user
        ];

    } catch (Exception $e) {
        return [
            'success' => false,
            'message' => 'Đã xảy ra lỗi: ' . $e->getMessage()
        ];
    } finally {
        mysqli_close($conn);
    }
}

function register($email, $phone, $password, $password_confirmation) {
    $conn = getDbConnection();
    
    try {
        // Validate input
        $errors = [];
        
        if (empty($email)) {
            $errors['email'] = 'Email không được để trống';
        } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $errors['email'] = 'Email không đúng định dạng';
        }
        
        if (empty($phone)) {
            $errors['phone'] = 'Số điện thoại không được để trống';
        } elseif (!preg_match("/^[0-9]{10}$/", $phone)) {
            $errors['phone'] = 'Số điện thoại phải có 10 chữ số';
        }
        
        if (empty($password)) {
            $errors['password'] = 'Mật khẩu không được để trống';
        } elseif (strlen($password) < 6) {
            $errors['password'] = 'Mật khẩu phải có ít nhất 6 ký tự';
        }
        
        if ($password !== $password_confirmation) {
            $errors['password_confirmation'] = 'Mật khẩu xác nhận không khớp';
        }

        if (!empty($errors)) {
            return [
                'success' => false,
                'errors' => $errors
            ];
        }

        // Kiểm tra email đã tồn tại
        $stmt = $conn->prepare("SELECT id FROM users WHERE email = ?");
        $stmt->bind_param("s", $email);
        $stmt->execute();
        if ($stmt->get_result()->num_rows > 0) {
            return [
                'success' => false,
                'errors' => ['email' => 'Email đã được sử dụng']
            ];
        }

        // Mã hóa mật khẩu
        $hashed_password = password_hash($password, PASSWORD_DEFAULT);
        
        // Thêm user mới
        $stmt = $conn->prepare("INSERT INTO users (email, phone, password, role) VALUES (?, ?, ?, 'user')");
        $stmt->bind_param("sss", $email, $phone, $hashed_password);
        
        if ($stmt->execute()) {
            return [
                'success' => true,
                'message' => 'Đăng ký thành công'
            ];
        } else {
            return [
                'success' => false,
                'message' => 'Đăng ký thất bại'
            ];
        }

    } catch (Exception $e) {
        return [
            'success' => false,
            'message' => 'Đã xảy ra lỗi: ' . $e->getMessage()
        ];
    } finally {
        mysqli_close($conn);
    }
}
function changePassword($userId, $currentPassword, $newPassword, $confirmPassword) {
    $conn = getDbConnection();
    
    try {
        // Validate input
        $errors = [];
        
        if (empty($currentPassword)) {
            $errors['current_password'] = 'Vui lòng nhập mật khẩu hiện tại';
        }
        
        if (empty($newPassword)) {
            $errors['new_password'] = 'Vui lòng nhập mật khẩu mới';
        } elseif (strlen($newPassword) < 6) {
            $errors['new_password'] = 'Mật khẩu mới phải có ít nhất 6 ký tự';
        }
        
        if ($newPassword !== $confirmPassword) {
            $errors['new_password_confirmation'] = 'Mật khẩu xác nhận không khớp';
        }

        // Kiểm tra mật khẩu hiện tại
        $stmt = $conn->prepare("SELECT password FROM users WHERE id = ?");
        $stmt->bind_param("i", $userId);
        $stmt->execute();
        $result = $stmt->get_result();
        $user = $result->fetch_assoc();

        if (!password_verify($currentPassword, $user['password'])) {
            $errors['current_password'] = 'Mật khẩu hiện tại không đúng';
        }

        if (!empty($errors)) {
            return [
                'success' => false,
                'errors' => $errors
            ];
        }

        // Cập nhật mật khẩu mới
        $hashedPassword = password_hash($newPassword, PASSWORD_DEFAULT);
        $stmt = $conn->prepare("UPDATE users SET password = ? WHERE id = ?");
        $stmt->bind_param("si", $hashedPassword, $userId);
        
        if ($stmt->execute()) {
            return [
                'success' => true,
                'message' => 'Đổi mật khẩu thành công!'
            ];
        } else {
            return [
                'success' => false,
                'errors' => ['global' => 'Có lỗi xảy ra khi cập nhật mật khẩu']
            ];
        }

    } catch (Exception $e) {
        return [
            'success' => false,
            'errors' => ['global' => 'Đã xảy ra lỗi: ' . $e->getMessage()]
        ];
    } finally {
        mysqli_close($conn);
    }
}