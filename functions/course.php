<?php
function getCourseById($id)
{
    $conn = getDbConnection();
    try {
        // Prepare statement
        $stmt = $conn->prepare("SELECT c.*, 
            u.email as instructor_email,
            COUNT(DISTINCT e.id) as enrolled_students,
            AVG(r.rating) as avg_rating,
            COUNT(DISTINCT r.id) as total_ratings
            FROM courses c
            LEFT JOIN users u ON c.instructor_id = u.id
            LEFT JOIN enrollments e ON c.id = e.course_id
            LEFT JOIN ratings r ON c.id = r.course_id
            WHERE c.id = ?
            GROUP BY c.id");

        $stmt->bind_param("i", $id);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows === 0) {
            return null;
        }

        $course = $result->fetch_assoc();

        // Decode JSON fields
        $course['curriculum'] = json_decode($course['curriculum'], true);
        $course['specifications'] = json_decode($course['specifications'], true);

        // Format some fields
        $course['rating'] = number_format($course['avg_rating'] ?? 0, 1);
        $course['total_students'] = (int)$course['enrolled_students'];

        return $course;
    } catch (Exception $e) {
        error_log("Error getting course details: " . $e->getMessage());
        return null;
    } finally {
        mysqli_close($conn);
    }
}
function getAllCourses()
{
    $conn = getDbConnection();
    try {
        $stmt = $conn->prepare("SELECT id, image, title, duration, total_students, price, rating, total_ratings 
                               FROM courses 
                               ORDER BY created_at DESC");
        $stmt->execute();
        $result = $stmt->get_result();
        return $result->fetch_all(MYSQLI_ASSOC);
    } catch (Exception $e) {
        error_log("Error getting courses: " . $e->getMessage());
        return [];
    } finally {
        mysqli_close($conn);
    }
}
function getRelatedCourses($limit = 3)
{
    $conn = getDbConnection();
    try {
        $stmt = $conn->prepare("SELECT * FROM courses ORDER BY created_at DESC LIMIT ?");
        $stmt->bind_param("i", $limit);
        $stmt->execute();
        return $stmt->get_result()->fetch_all(MYSQLI_ASSOC);
    } catch (Exception $e) {
        error_log("Error getting related courses: " . $e->getMessage());
        return [];
    } finally {
        mysqli_close($conn);
    }
}

function getCategories()
{
    $conn = getDbConnection();
    try {
        $result = $conn->query("SELECT c.*, COUNT(co.id) as course_count 
            FROM categories c
            LEFT JOIN courses co ON c.id = co.category_id
            GROUP BY c.id");

        return $result->fetch_all(MYSQLI_ASSOC);
    } catch (Exception $e) {
        error_log("Error getting categories: " . $e->getMessage());
        return [];
    } finally {
        mysqli_close($conn);
    }
}

function getPopularCourses($limit = 6)
{
    $conn = getDbConnection();
    try {
        // Lấy trực tiếp từ bảng courses vì đã có sẵn các trường cần thiết
        $query = "SELECT 
            id,
            title,
            image,
            price,
            duration,
            total_students,
            rating,
            total_ratings,
            curriculum,
            specifications
            FROM courses 
            ORDER BY total_students DESC, rating DESC 
            LIMIT ?";

        $stmt = $conn->prepare($query);
        if (!$stmt) {
            error_log("Prepare failed: " . $conn->error);
            return [];
        }

        $stmt->bind_param("i", $limit);
        $stmt->execute();
        $result = $stmt->get_result();

        if (!$result) {
            error_log("Query failed: " . $conn->error);
            return [];
        }

        $courses = $result->fetch_all(MYSQLI_ASSOC);

        // Format the data
        foreach ($courses as &$course) {
            $course['total_students'] = (int)$course['total_students'];
            $course['rating'] = $course['rating'] ? round($course['rating'], 1) : 0;
            $course['total_ratings'] = (int)$course['total_ratings'];
        }

        return $courses;
    } catch (Exception $e) {
        error_log("Error getting popular courses: " . $e->getMessage());
        return [];
    } finally {
        if (isset($stmt)) {
            $stmt->close();
        }
        mysqli_close($conn);
    }
}
