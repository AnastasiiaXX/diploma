<?php
/* @var $model User */

use yii\widgets\ActiveForm;
use yii\authclient\widgets\AuthChoice;
use yii\helpers\Html;
?>
<div class="table-layout">
  <header class=" page-header--index">
    <div class="main-container page-header__container page-header__container--index">
      <div class="page-header__logo--index">
                <a>
                <img 
                    class="logo-image--index"
                    src="../img/taskmarket_transparent.png"
                    alt="TaskMarket"
                     style="height:130px; width:auto;"
                >
            </a>
               <p style="text-align: center; font-size: 25px;">Работа там, где ты!</p>
            </div>
      <div class="header__account--index">
        <a href="#" class="header__account-enter open-modal" data-for="enter-form">
          <span>Вход</span></a>
        или
        <a href="<?= Yii::$app->urlManager->createUrl(['/sign-up']) ?>" class="header__account-registration">
          Регистрация
        </a>
      </div>
    </div>
  </header>
  <main>
    <div class="landing-container">
      <div class="landing-top">
        <h1>Работа для всех.<br>
          Найди исполнителя на любую задачу.</h1>
        <p>Сломался кран на кухне? Надо отправить документы? Нет времени самому гулять с собакой?
          У нас вы быстро найдёте исполнителя для любой жизненной ситуации!<br>
          Быстро, безопасно и с гарантией. Просто, как раз, два, три. </p>
        <a href="<?= Yii::$app->urlManager->createUrl(['/sign-up']) ?>" class="button">
          Создать аккаунт
        </a>
      </div>
      <div class="landing-center">
        <div class="landing-instruction">
          <div class="landing-instruction-step">
            <div class="instruction-circle circle-request"></div>
            <div class="instruction-description">
              <h3>Публикация заявки</h3>
              <p>Создайте новую заявку.</p>
              <p>Опишите в ней все детали
                и стоимость работы.</p>
            </div>
          </div>
          <div class="landing-instruction-step">
            <div class="instruction-circle  circle-choice"></div>
            <div class="instruction-description">
              <h3>Выбор исполнителя</h3>
              <p>Получайте отклики от мастеров.</p>
              <p>Выберите подходящего<br>
                вам исполнителя.</p>
            </div>
          </div>
          <div class="landing-instruction-step">
            <div class="instruction-circle  circle-discussion"></div>
            <div class="instruction-description">
              <h3>Отклики и отзывы</h3>
              <p>Исполнители откликаются на задания,<br>
                  заказчики оставляют отзывы и рейтинг.</p>
            </div>
          </div>
          <div class="landing-instruction-step">
            <div class="instruction-circle circle-payment"></div>
            <div class="instruction-description">
              <h3>Оплата&nbsp;работы</h3>
              <p>По завершении работы оплатите
                услугу и закройте задание</p>
            </div>
          </div>
        </div>
        <div class="landing-notice">
          <div class="landing-notice-card card-executor">
            <h3>Исполнителям</h3>
            <ul class="notice-card-list">
              <li>
                Большой выбор заданий
              </li>
              <li>
                Работайте где удобно
              </li>
              <li>
                Свободный график
              </li>
              <li>
                Удалённая работа
              </li>
              <li>
                Гарантия оплаты
              </li>
            </ul>
          </div>
          <div class="landing-notice-card card-customer">
            <h3>Заказчикам</h3>
            <ul class="notice-card-list">
              <li>
                Исполнители на любую задачу
              </li>
              <li>
                Достоверные отзывы
              </li>
              <li>
                Оплата по факту работы
              </li>
              <li>
                Экономия времени и денег
              </li>
              <li>
                Выгодные цены
              </li>
            </ul>
          </div>
        </div>
      </div>
    </div>
  </main>
  <footer class="page-footer">
    <div class="main-container page-footer__container">
      <div class="page-footer__info">
        <p class="page-footer__info-copyright">
          © 2026, ООО «ТаскМаркет»
          Все права защищены
        </p>
        <p class="page-footer__info-use">
          «TaskMarket» — это сервис для поиска исполнителей на разовые задачи.
          mail@taskmarket.space
        </p>
      </div>
      <div class="page-footer__links">
        <ul class="links__list">
            <li class="links__item">
                <a href="<?= Yii::$app->urlManager->createUrl(['/landing/index']) ?>">Войти</a>
            </li>
            <li class="links__item">
                <a href="<?= Yii::$app->urlManager->createUrl(['/site/privacy']) ?>" target="_blank">Политика конфиденциальности</a>
            </li>
          <li class="links__item">
            <a href="<?= Yii::$app->urlManager->createUrl(['/sign-up']) ?>">Регистрация</a>
          </li>
        </ul>
      </div>
    </div>
  </footer>
  <section class="modal enter-form form-modal" id="enter-form">
    <?php if ($showModal): ?>
      <script>
        document.addEventListener('DOMContentLoaded', function() {
          var modal = document.getElementById('enter-form');
          if (modal) {
            modal.style.display = 'block';
          }
        });
      </script>
    <?php endif; ?>
    <?php $form = ActiveForm::begin([
      'id' => 'login-form',
      'options' => ['class' => 'log-in'],
      'validationUrl' => ['landing/index']
    ]) ?>
    <h2>Вход на сайт</h2>

    <?= $form->field($model, 'email', [
      'options' => ['class' => 'form-modal-description']
    ])
      ->textInput(['class' => 'enter-form-email input input-middle', 'placeholder' => 'Адрес электронной почты']);
    ?>

    <?= $form->field($model, 'password', [
      'options' => ['class' => 'form-modal-description']
    ])
      ->passwordInput(['class' => 'enter-form-email input input-middle', 'placeholder' => 'Пароль']);
    ?>
    <div class="button-group">
      <button class="button" type="submit">Войти</button>
    </div>

    <?php ActiveForm::end(); ?>

    <!-- Яндекс OAuth кнопка -->
<div class="yandex-auth-wrapper">
  <?php
  $authAuthChoice = AuthChoice::begin([
    'baseAuthUrl' => ['landing/auth'],
  ]);

  foreach ($authAuthChoice->getClients() as $client) {
    echo Html::a(
      '<span style="display:inline-flex;align-items:center;justify-content:center;width:20px;height:20px;background:#fff;color:#FC3F1D;border-radius:50%;font-weight:700;font-size:13px;margin-right:8px;flex-shrink:0;">Я</span>
<span>Войти через Яндекс ID</span>',
      $authAuthChoice->createClientUrl($client),
      ['class' => 'button button--yandex']
    );
  }

  AuthChoice::end();
  ?>
</div>

<button class="form-modal-close" type="button">Закрыть</button>
</section>

<style>
  .button-group {
    margin-bottom: 0;
  }

  .log-in .button {
    width: 100%;
    margin-bottom: 0;
  }

  .yandex-auth-wrapper {
    margin-top: 15px;
    padding: 0;
    width: 100%;
  }

  .button--yandex {
    display: inline-flex;
    align-items: center;
    justify-content: center;
    width: 100%;
    max-width: 100%;
    padding: 12px 20px;
    background-color: #FC3F1D;
    color: #ffffff;
    border: none;
    border-radius: 4px;
    font-size: 14px;
    font-weight: 500;
    text-decoration: none;
    transition: background-color 0.2s ease;
    box-sizing: border-box;
  }

  .button--yandex:hover {
    background-color: #d93518;
    color: #ffffff;
    text-decoration: none;
  }

  .button--yandex svg {
    flex-shrink: 0;
  }
</style>