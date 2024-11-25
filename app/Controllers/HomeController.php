<?php

namespace App\Controllers;

use App\Middlewares\AuthMiddleware;
use App\Models\CoursesModel;
use App\Services\Mail;
use App\Validations\ContactForm;

class HomeController extends Controller
{
    /**
     * method Index.
     * principal page
     * @return string
     */
    public function index(): string
    {
        $authMiddleware = new AuthMiddleware();
        $result = $authMiddleware->handle();

        return view('home', ['logged' => $result['success']]);
    }

    public function info(): string
    {
        $authMiddleware = new AuthMiddleware();
        $result = $authMiddleware->handle();

        return view('quienes-somos', ['logged' => $result['success']]);
    }

    public function trayectos(): string
    {
        $authMiddleware = new AuthMiddleware();
        $result = $authMiddleware->handle();

        $courses = new CoursesModel();
        $result = $courses->all();

        return view('trayectos', ['logged' => $result['success'], 'courses' => $result]);
    }

    public function contact(): string
    {
        $authMiddleware = new AuthMiddleware();
        $result = $authMiddleware->handle();

        return view('contacto', ['logged' => $result['success']]);
    }

    /**
     * method mail.
     *
     * @return array
     */
    public function mail(): array|string
    {
        $isValid = ContactForm::validate($this->request);
        if (!$isValid['success']) {
            return $isValid;
        }

        $to = $this->request['to'];
        $subject = $this->request['subject'];
        $message = $this->request['message'];

        $to = htmlspecialchars($to);
        $subject = htmlspecialchars($subject);
        $message = htmlspecialchars($message);

        $response = Mail::send($to, $subject, $message);

        return $response;
    }

    public function preinscription(): string
    {
        $authMiddleware = new AuthMiddleware();
        $result = $authMiddleware->handle();

        $coursesModel = new CoursesModel();
        $courses = $coursesModel->all();

        return view('preinscription', ['logged' => $result['success'], 'courses' => $courses]);
    }
}
