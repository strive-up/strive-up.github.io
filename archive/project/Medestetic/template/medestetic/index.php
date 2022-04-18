<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetTitle("Клиника эстетической медицины и лазерной косметологии");
?>

        <!--    Content    -->
        <main>
            
            <section class="intro">

                <div class="intro__container">

                    <div class="intro__content">

                        <div class="intro__header">
                            <p>Лазерная эпиляция всего тела Candela</p>
                        </div>

                        <div class="intro__price">
                            <p>15 000 руб.</p>
                        </div>

                        <button class="btn btn--purple" data-path="first" data-animation="fade" data-speed="300">Записаться на прием</button>

                    </div>

                    <div class="intro__image"><img src="<?=SITE_TEMPLATE_PATH;?>/img/intro.png" alt=""></div>

                </div>

            </section>

            <?$APPLICATION->IncludeComponent(
                "bitrix:breadcrumb", 
                "pagination", 
                array(
                    "PATH" => "",
                    "SITE_ID" => "s1",
                    "START_FROM" => "1",
                    "COMPONENT_TEMPLATE" => "pagination"
                ),
                false
            );?>

            <section class="content">

                <div class="content__container">

                    <div class="content__blog">

                        <div class="content__header">H2 Лазерная эпиляция александритовым лазером</div>
                        <div class="content__text">В косметологическом центре «Мед Эстетик» вам помогут навсегда решить проблему нежелательных волосков на теле с помощью процедуры эпиляции с использованием лазера Candela GentleLase Pro. CandelaCorporation (США) выпускает устройства премиум-класса, обладающие высокой эффективностью и мощностью. Отзывы ведущих мировых дерматологов-косметологов и наших клиентов свидетельствуют о том, что александритовый лазер Кандела эффективно удаляет волосы с I-IV фототипов кожи (подходит почти всем жителям РФ и СНГ).</div>    

                    </div>

                    <div class="content__blog">

                        <div class="content__header">H2 Технология эпиляции александритовым лазером Candela Gentlelase Pro</div>
                        <div class="content__text__flow-around">
                            <div class="content__image"><img src="<?=SITE_TEMPLATE_PATH;?>/img/content/image-1.png" alt=""></div>
                            <div class="content__text">Лазер оказывает воздействие на меланин, являющийся тёмным пигментом волоса – это приводит к разрушению его структуры. Перед началом процедуры специалисту нужно осмотреть волосяную область, чтобы оценить глубину роста и качество волос. Это необходимо для подбора подходящей интенсивности излучения.</div>    
                            <div class="content__text">В процессе проведения процедуры лазерное излучение проникает на глубину 755 нм, где волосяная луковица испаряется без повреждения расположенных рядом тканей и риска перегрева. На этом участке создаётся пробка, предупреждающая дальнейший рост волоса.</div>
                        </div>
                        <div class="content__text">Эффект от процедуры депиляции сохраняется на протяжении 1-1,5 месяцев, а после необходимо провести повторный сеанс. В среднем продолжительность каждой процедуры составляет 30-60 минут. Наличие охлаждающей системы позволяет избавить клиента от болевых ощущений и появления ожогов, поэтому реабилитация не требуется.</div>

                    </div>

                </div>

            </section>

            <section class="prices">

                <div class="prices__container">

                    <div class="content__header">H2 Цены</div>

                    <div class="prices__switch__button">
                        <button class="btn--switch" id = "defaultOpen" onclick="switchPrices(event, 'prices__women');">Женщинам</button>
                        <button class="btn--switch" onclick="switchPrices(event, 'prices__men');">Мужчинам</button>
                    </div>

                    <div id="prices__women" class="contents">
                        
                        <div class="services__item">

                            <div class="services__item__info">
                                <p class="services__item__name">Консультация</p>
                                <p class="services__item__price">бесплатно</p>
                            </div>

                            <button class="btn btn--purple" data-path="first" data-animation="fade" data-speed="300">Записаться</button>

                        </div>

                        <div class="services__item">

                            <div class="services__item__info">
                                <p class="services__item__name">«Бикини» по линии белья</p>
                                <p class="services__item__price">2500 руб.</p>
                            </div>

                            <button class="btn btn--purple" data-path="first" data-animation="fade" data-speed="300">Записаться</button>

                        </div>

                        <div class="services__item">

                            <div class="services__item__info">
                                <p class="services__item__name">Глубокое «бикини»</p>
                                <p class="services__item__price">3500 руб.</p>
                            </div>

                            <button class="btn btn--purple" data-path="first" data-animation="fade" data-speed="300">Записаться</button>

                        </div>

                        <div class="services__item">

                            <div class="services__item__info">
                                <p class="services__item__name">Тотальное «бикини»</p>
                                <p class="services__item__price">5000 руб.</p>
                            </div>

                            <button class="btn btn--purple" data-path="first" data-animation="fade" data-speed="300">Записаться</button>

                        </div>

                        <div class="services__item">

                            <div class="services__item__info">
                                <p class="services__item__name">Обработка бикини триммером</p>
                                <p class="services__item__price">300 руб.</p>
                            </div>

                            <button class="btn btn--purple" data-path="first" data-animation="fade" data-speed="300">Записаться</button>

                        </div>

                    </div>

                    <div id="prices__men" class="contents">
                        
                        <div class="services__item">

                            <div class="services__item__info">
                                <p class="services__item__name">Консультация</p>
                                <p class="services__item__price">бесплатно</p>
                            </div>

                            <button class="btn btn--purple" data-path="first" data-animation="fade" data-speed="300">Записаться</button>

                        </div>

                        <div class="services__item">

                            <div class="services__item__info">
                                <p class="services__item__name">«Бикини» по линии белья</p>
                                <p class="services__item__price">3500 руб.</p>
                            </div>

                            <button class="btn btn--purple" data-path="first" data-animation="fade" data-speed="300">Записаться</button>

                        </div>

                        <div class="services__item">

                            <div class="services__item__info">
                                <p class="services__item__name">Глубокое «бикини»</p>
                                <p class="services__item__price">4500 руб.</p>
                            </div>

                            <button class="btn btn--purple" data-path="first" data-animation="fade" data-speed="300">Записаться</button>

                        </div>

                        <div class="services__item">

                            <div class="services__item__info">
                                <p class="services__item__name">Тотальное «бикини»</p>
                                <p class="services__item__price">6000 руб.</p>
                            </div>

                            <button class="btn btn--purple" data-path="first" data-animation="fade" data-speed="300">Записаться</button>

                        </div>

                        <div class="services__item">

                            <div class="services__item__info">
                                <p class="services__item__name">Обработка бикини триммером</p>
                                <p class="services__item__price">500 руб.</p>
                            </div>

                            <button class="btn btn--purple" data-path="first" data-animation="fade" data-speed="300">Записаться</button>

                        </div>

                    </div>

                </div>

            </section>

            <section class="content">

                <div class="content__container">

                    <div class="content__blog">

                        <div class="content__header">H2 Что из себя представляет процедура?</div>
                        <div class="content__text">Благодаря использованию александритового лазера Candela GentleMax Pro можно безопасно и эффективно устранить волосы, растущие на щеках, подбородке, между бровями и над верхней губой. Кожа станет гладкой и чистой, без нежелательной растительности. При этом у вас не останется сыпи и раздражения на лице после процедуры.</div>
                        <div class="content__text">Попадающий на обрабатываемый участок луч трансформируется в тепловую энергию, которая влияет на фолликул, пребывающий в стадии активного роста. Под тепловым влиянием волосяная луковица разрушается, что приводит к прекращению роста волоса.</div>
                        <div class="content__text">При этом нужно учитывать, что волосы не растут одновременно. Они всегда находятся в разных стадиях: переходная стадия, период роста и покоя. Из-за этого достичь нужного результата за 1 процедуру не получится – поэтому лазерная эпиляция любых участков лица (над губой, подбородка, щек или даже шеи), всегда проходит курсами.</div>
                        <div class="content__text">После проведения процедуры через 30-50 дней в области обработки снова вырастают волоски. Они уже имеют изменённую структуру – тонкие, ослабленные, светлые. Это является сигналом к записи на прием к специалисту и проведению повторной процедуры.</div>

                    </div>

                    <div class="content__blog">

                        <div class="content__header">H3 В чем отличия лазерной эпиляции от обычной эпиляции?</div>
                        <div class="content__text">Для начала разберем принцип проведения каждой из этих процедур по удалению нежелательной растительности. При депиляции удаляются волосы только на поверхности эпидермиса, без воздействия на корень волоса и его внутреннюю часть. В случае эпиляции лазером воздействие оказывается на волосяной корень, благодаря чему их можно убрать на длительное время.</div>
                        <div class="content__text">Растительность при лазерной эпиляции устраняется полностью, а все волосяные ткани при этом разрушаются (происходит воздействие на фолликул). Со временем, при регулярном проведении процедуры, волосы прекращают расти совсем и этот эффект сохраняется на долгие годы.</div>

                    </div>

                </div>

            </section>

            <section class="banner">

                <div class="banner__container">

                    <div class="banner__content">

                        <div class="banner__text">Получите скидку на 1-е посещение</div>
                        <div class="banner__contact">8 (499) 390-11-15</div>
                        <button class="btn btn--purple" data-path="first" data-animation="fade" data-speed="300">Записаться на прием</button>

                    </div>

                </div>
                
            </section>

            <section class="content">

                <div class="content__container">

                    <div class="content__blog">

                        <div class="content__header">H2 Другие услуги</div>
                        
                        <div class="services__wrapper">

                            <div class="services__item">

                                <div class="services__item__header">Лазерная эпиляция зоны бикини</div>
                                <div class="services__item__price">от 2500 руб.</div>
                                <button class="btn--more btn--purple"><img src="<?=SITE_TEMPLATE_PATH;?>/img/arrow.svg" alt=""></button>

                            </div>

                            <div class="services__item">

                                <div class="services__item__header">Лазерная эпиляция лица</div>
                                <div class="services__item__price">от 1300 руб.</div>
                                <button class="btn--more btn--purple"><img src="<?=SITE_TEMPLATE_PATH;?>/img/arrow.svg" alt=""></button>

                            </div>

                            <div class="services__item">

                                <div class="services__item__header">Лазерная эпиляция ног</div>
                                <div class="services__item__price">от 5000 руб.</div>
                                <button class="btn--more btn--purple"><img src="<?=SITE_TEMPLATE_PATH;?>/img/arrow.svg" alt=""></button>

                            </div>

                            <div class="services__item">

                                <div class="services__item__header">Лазерная эпиляция рук</div>
                                <div class="services__item__price">от 4200 руб.</div>
                                <button class="btn--more btn--purple"><img src="<?=SITE_TEMPLATE_PATH;?>/img/arrow.svg" alt=""></button>

                            </div>

                            <div class="services__item">

                                <div class="services__item__header">Лазерная эпиляция подмышечных впадин</div>
                                <div class="services__item__price">от 1200 руб.</div>
                                <button class="btn--more btn--purple"><img src="<?=SITE_TEMPLATE_PATH;?>/img/arrow.svg" alt=""></button>

                            </div>

                            <div class="services__item">

                                <div class="services__item__header">Лазерная эпиляция для мужчин</div>
                                <div class="services__item__price">от 1300 руб.</div>
                                <button class="btn--more btn--purple"><img src="<?=SITE_TEMPLATE_PATH;?>/img/arrow.svg" alt=""></button>

                            </div>


                        </div>

                    </div>

                </div>

            </section>

            <!--    Slider    -->
            <?$APPLICATION->IncludeComponent("bitrix:news.list", "experts__slider", Array(
                "ACTIVE_DATE_FORMAT" => "d.m.Y",	// Формат показа даты
                    "ADD_SECTIONS_CHAIN" => "N",	// Включать раздел в цепочку навигации
                    "AJAX_MODE" => "N",	// Включить режим AJAX
                    "AJAX_OPTION_ADDITIONAL" => "",	// Дополнительный идентификатор
                    "AJAX_OPTION_HISTORY" => "N",	// Включить эмуляцию навигации браузера
                    "AJAX_OPTION_JUMP" => "N",	// Включить прокрутку к началу компонента
                    "AJAX_OPTION_STYLE" => "N",	// Включить подгрузку стилей
                    "CACHE_FILTER" => "N",	// Кешировать при установленном фильтре
                    "CACHE_GROUPS" => "N",	// Учитывать права доступа
                    "CACHE_TIME" => "36000000",	// Время кеширования (сек.)
                    "CACHE_TYPE" => "N",	// Тип кеширования
                    "CHECK_DATES" => "Y",	// Показывать только активные на данный момент элементы
                    "DETAIL_URL" => "",	// URL страницы детального просмотра (по умолчанию - из настроек инфоблока)
                    "DISPLAY_BOTTOM_PAGER" => "Y",	// Выводить под списком
                    "DISPLAY_DATE" => "Y",	// Выводить дату элемента
                    "DISPLAY_NAME" => "Y",	// Выводить название элемента
                    "DISPLAY_PICTURE" => "Y",	// Выводить изображение для анонса
                    "DISPLAY_PREVIEW_TEXT" => "Y",	// Выводить текст анонса
                    "DISPLAY_TOP_PAGER" => "N",	// Выводить над списком
                    "FIELD_CODE" => array(	// Поля
                        0 => "NAME",
                        1 => "",
                    ),
                    "FILTER_NAME" => "",	// Фильтр
                    "HIDE_LINK_WHEN_NO_DETAIL" => "N",	// Скрывать ссылку, если нет детального описания
                    "IBLOCK_ID" => "5",	// Код информационного блока
                    "IBLOCK_TYPE" => "content",	// Тип информационного блока (используется только для проверки)
                    "INCLUDE_IBLOCK_INTO_CHAIN" => "N",	// Включать инфоблок в цепочку навигации
                    "INCLUDE_SUBSECTIONS" => "Y",	// Показывать элементы подразделов раздела
                    "MESSAGE_404" => "",	// Сообщение для показа (по умолчанию из компонента)
                    "NEWS_COUNT" => "100",	// Количество новостей на странице
                    "PAGER_BASE_LINK_ENABLE" => "N",	// Включить обработку ссылок
                    "PAGER_DESC_NUMBERING" => "N",	// Использовать обратную навигацию
                    "PAGER_DESC_NUMBERING_CACHE_TIME" => "36000",	// Время кеширования страниц для обратной навигации
                    "PAGER_SHOW_ALL" => "N",	// Показывать ссылку "Все"
                    "PAGER_SHOW_ALWAYS" => "N",	// Выводить всегда
                    "PAGER_TEMPLATE" => ".default",	// Шаблон постраничной навигации
                    "PAGER_TITLE" => "",	// Название категорий
                    "PARENT_SECTION" => "",	// ID раздела
                    "PARENT_SECTION_CODE" => "",	// Код раздела
                    "PREVIEW_TRUNCATE_LEN" => "",	// Максимальная длина анонса для вывода (только для типа текст)
                    "PROPERTY_CODE" => array(	// Свойства
                        0 => "experts__spec",
                        1 => "experts__images",
                        2 => "",
                    ),
                    "SET_BROWSER_TITLE" => "N",	// Устанавливать заголовок окна браузера
                    "SET_LAST_MODIFIED" => "N",	// Устанавливать в заголовках ответа время модификации страницы
                    "SET_META_DESCRIPTION" => "N",	// Устанавливать описание страницы
                    "SET_META_KEYWORDS" => "N",	// Устанавливать ключевые слова страницы
                    "SET_STATUS_404" => "N",	// Устанавливать статус 404
                    "SET_TITLE" => "N",	// Устанавливать заголовок страницы
                    "SHOW_404" => "N",	// Показ специальной страницы
                    "SORT_BY1" => "SORT",	// Поле для первой сортировки новостей
                    "SORT_BY2" => "SORT",	// Поле для второй сортировки новостей
                    "SORT_ORDER1" => "ASC",	// Направление для первой сортировки новостей
                    "SORT_ORDER2" => "ASC",	// Направление для второй сортировки новостей
                    "STRICT_SECTION_CHECK" => "N",	// Строгая проверка раздела для показа списка
                ),
                false
            );?>
            <!------------------>

            <section class="content">

                <div class="content__container">

                    <div class="content__blog">

                        <div class="content__header">H2 Виды лазеров для проведения процедуры</div>
                        <div class="content__text__flow-around">
                            <div class="content__image"><img src="<?=SITE_TEMPLATE_PATH;?>/img/content/image-2.png" alt=""></div>
                            
                            <div class="content__text"><div class="content__text__title">Александритовый</div>Наилучший эффект демонстрирует на светлой, незагорелой коже, на которой растут тёмные волосы. Чтобы процедура была безболезненной и не привела к ожогам, в процессе выполнения используется охлаждение. Такой лазер не может удалять светлые волосы, но способен работать с кожей, имеющей слабый загар.</div>
                        </div>
                        <div class="content__text__flow-around">
                            <div class="content__image"><img src="<?=SITE_TEMPLATE_PATH;?>/img/content/image-3.png" alt=""></div>
                            <div class="content__text"><div class="content__text__title">Неодимовый</div>Обеспечивает инфракрасное излучение в ближнем диапазоне. Этот лазер хорошо воздействует на седые, рыжие, светлые и пушковые волосы на любой коже. Поскольку неодимовый лазер способен оказывать влияние как на меланин, так и на оксигемоглобин, этот аппарат успешно справляется с устранением рубцов, сосудистых болезней, татуировок и постакне. </div>
                        </div>
                        <div class="content__text">Благодаря фильтрам, регулирующим длину волны, и встроенной охладительной системе, риск появления ожогов полностью исключается. Такой лазер можно применять как на светлой, так и на крайне тёмной или сильно загорелой коже.</div>

                    </div>

                </div>

            </section>

            <section class="benefits__container">

                <div class="benefits">

                    <div class="content__header">Наши преимущества</div>

                    <div class="benefits__wrapper">

                        <div class="benefits--col">

                            <div class="benefits__items">

                                <img src="<?=SITE_TEMPLATE_PATH;?>/img/checkmarks.svg" alt="">
                                <div class="benefits__text">Премиальное оборудование</div>

                            </div>

                            <div class="benefits__items">

                                <img src="<?=SITE_TEMPLATE_PATH;?>/img/checkmarks.svg" alt="">
                                <div class="benefits__text">Доступные цены</div>

                            </div>

                            <div class="benefits__items">

                                <img src="<?=SITE_TEMPLATE_PATH;?>/img/checkmarks.svg" alt="">
                                <div class="benefits__text">Регулярные акции</div>

                            </div>

                        </div>

                        <div class="benefits--col">

                            <div class="benefits__items">

                                <img src="<?=SITE_TEMPLATE_PATH;?>/img/checkmarks.svg" alt="">
                                <div class="benefits__text">Бесплатная консультация</div>
    
                            </div>
    
                            <div class="benefits__items">
    
                                <img src="<?=SITE_TEMPLATE_PATH;?>/img/checkmarks.svg" alt="">
                                <div class="benefits__text">Высокий сервис и теплая атмосфера</div>
    
                            </div>
    
                            <div class="benefits__items">
    
                                <img src="<?=SITE_TEMPLATE_PATH;?>/img/checkmarks.svg" alt="">
                                <div class="benefits__text">Сотни довольных клиентов</div>
    
                            </div>

                        </div>

                    </div>

                </div>    

            </section>

            <script type="text/javascript" charset="utf-8" async src="https://api-maps.yandex.ru/services/constructor/1.0/js/?um=constructor%3Abc6739b71580b7fdfbbfe7cc146aea1573656e7b467bd41fb7c5a1e6d99910af&amp;width=100%&amp;height=312&amp;lang=ru_RU&amp;scroll=true"></script>

            <section class="license">

                <div class="license__container">

                    <div class="license__wrapper">

                        <div class="license__text">
                            <div class="content__header">Лицензия</div>
                            <div class="content__text">Лицензиця Лицензия ЛО-77-01-01-52-37  от 28 ноября 2017 года выдана департаментом здравоохранения города Москвы на осуществление медицинской деятельности Обществу с ограниченной ответственностью ООО “Лазер Эстетик”. ОГРН 1177746595883</div>
                        </div>
    
                        <div class="license__image">
                            <img src="<?=SITE_TEMPLATE_PATH;?>/img/license/lic-1.png" alt="">
                            <img src="<?=SITE_TEMPLATE_PATH;?>/img/license/lic-1.png" alt="">
                        </div>

                    </div>

                </div>

            </section>

        </main>

<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>