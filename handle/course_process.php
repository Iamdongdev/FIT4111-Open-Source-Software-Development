<?php
require_once __DIR__ . '/../functions/config.php';
require_once __DIR__ . '/../functions/course.php';

function handleCourseDetail($courseId) {
    // Get course details
    $course = getCourseById($courseId);
    
    if (!$course) {
        return [
            'success' => false,
            'error' => 'Không tìm thấy khóa học'
        ];
    }

    // Get related courses
    $relatedCourses = getRelatedCourses($course['category_id'], $courseId);
    
    // Get categories for sidebar
    $categories = getCategories();

    return [
        'success' => true,
        'data' => [
            'course' => $course,
            'relatedCourses' => $relatedCourses,
            'categories' => $categories
        ]
    ];
}