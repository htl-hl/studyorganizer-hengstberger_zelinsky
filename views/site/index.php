<?php

/** @var yii\web\View $this */

use yii\helpers\Html;

$this->title = 'About Us';
?>

<div class="site-about">
    <h1><?= Html::encode($this->title) ?></h1>
    <hr>
    <div class="row mt-4 mb-5">
        <div class="col-12">
            <div class="card border-secondary">
                <div class="card-body">
                    <h4 class="card-title mb-3">
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-info-circle me-2" viewBox="0 0 16 16">
                            <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14m0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16"/>
                            <path d="m8.93 6.588-2.29.287-.082.38.45.083c.294.07.352.176.288.469l-.738 3.468c-.194.897.105 1.319.808 1.319.545 0 1.178-.252 1.465-.598l.088-.416c-.2.176-.492.246-.686.246-.275 0-.375-.193-.304-.533zM9 4.5a1 1 0 1 1-2 0 1 1 0 0 1 2 0"/>
                        </svg>
                        Über das Projekt
                    </h4>
                    <p class="card-text text-muted">
                        Diese Anwendung ist eine Schul-App zur Verwaltung von Hausaufgaben und Fächern.
                        Schüler können ihre Aufgaben erfassen, den Status verfolgen und nach Fälligkeitsdatum organisieren.
                        Admins haben einen Überblick über alle Aufgaben und Fächer.
                    </p>
                </div>
            </div>
        </div>
    </div>

    <h4 class="mb-3">
        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-people me-2" viewBox="0 0 16 16">
            <path d="M15 14s1 0 1-1-1-4-5-4-5 3-5 4 1 1 1 1zm-7.978-1L7 12.996c.001-.264.167-1.03.76-1.72C8.312 10.629 9.282 10 11 10c1.717 0 2.687.63 3.24 1.276.593.69.758 1.457.76 1.72l-.008.002-.014.002zM11 7a2 2 0 1 0 0-4 2 2 0 0 0 0 4m3-2a3 3 0 1 1-6 0 3 3 0 0 1 6 0M6.936 9.28a6 6 0 0 0-1.23-.247A7 7 0 0 0 5 9c-4 0-5 3-5 4q0 1 1 1h4.216A2.24 2.24 0 0 1 5 13c0-1.01.377-2.042 1.09-2.904.243-.294.526-.569.846-.816M4.92 10A5.5 5.5 0 0 0 4 13H1c0-.26.164-1.03.76-1.724.545-.636 1.492-1.256 3.16-1.275ZM1.5 5.5a3 3 0 1 1 6 0 3 3 0 0 1-6 0m3-2a2 2 0 1 0 0 4 2 2 0 0 0 0-4"/>
        </svg>
        Das Team
    </h4>
    <div class="row g-4 mb-5">
        <div class="col-md-6">
            <div class="card h-100 border-secondary">
                <div class="card-body text-center">
                    <div class="mb-3">
                        <svg xmlns="http://www.w3.org/2000/svg" width="56" height="56" fill="currentColor" class="bi bi-person-circle text-secondary" viewBox="0 0 16 16">
                            <path d="M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0"/>
                            <path fill-rule="evenodd" d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8m8-7a7 7 0 0 0-5.468 11.37C3.242 11.226 4.805 10 8 10s4.757 1.225 5.468 2.37A7 7 0 0 0 8 1"/>
                        </svg>
                    </div>
                    <h5 class="card-title">Elisabeth Hengstberger</h5>
                    <p class="text-muted mb-0">Entwicklerin</p>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="card h-100 border-secondary">
                <div class="card-body text-center">
                    <div class="mb-3">
                        <svg xmlns="http://www.w3.org/2000/svg" width="56" height="56" fill="currentColor" class="bi bi-person-circle text-secondary" viewBox="0 0 16 16">
                            <path d="M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0"/>
                            <path fill-rule="evenodd" d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8m8-7a7 7 0 0 0-5.468 11.37C3.242 11.226 4.805 10 8 10s4.757 1.225 5.468 2.37A7 7 0 0 0 8 1"/>
                        </svg>
                    </div>
                    <h5 class="card-title">Jan Zelinsky</h5>
                    <p class="text-muted mb-0">Entwickler</p>
                </div>
            </div>
        </div>

    </div>
    <h4 class="mb-3">
        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-code-slash me-2" viewBox="0 0 16 16">
            <path d="M10.478 1.647a.5.5 0 1 0-.956-.294l-4 13a.5.5 0 0 0 .956.294zM4.854 4.146a.5.5 0 0 1 0 .708L1.707 8l3.147 3.146a.5.5 0 0 1-.708.708l-3.5-3.5a.5.5 0 0 1 0-.708l3.5-3.5a.5.5 0 0 1 .708 0m6.292 0a.5.5 0 0 0 0 .708L14.293 8l-3.147 3.146a.5.5 0 0 0 .708.708l3.5-3.5a.5.5 0 0 0 0-.708l-3.5-3.5a.5.5 0 0 0-.708 0"/>
        </svg>
        Technologien
    </h4>
    <div class="row g-3 mb-5">
        <?php
        $techs = [
                ['name' => 'PHP', 'color' => 'primary'],
                ['name' => 'Yii2 Framework', 'color' => 'danger'],
                ['name' => 'Bootstrap 5', 'color' => 'secondary'],
                ['name' => 'MySQL', 'color' => 'success'],
                ['name' => 'HTML / CSS', 'color' => 'warning'],
        ];
        foreach ($techs as $tech): ?>
            <div class="col-auto">
                <span class="badge rounded-pill bg-<?= $tech['color'] ?> fs-6 px-3 py-2">
                    <?= $tech['name'] ?>
                </span>
            </div>
        <?php endforeach; ?>
    </div>

</div>