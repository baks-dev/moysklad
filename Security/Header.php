<?php
/*
 *  Copyright 2024.  Baks.dev <admin@baks.dev>
 *  
 *  Permission is hereby granted, free of charge, to any person obtaining a copy
 *  of this software and associated documentation files (the "Software"), to deal
 *  in the Software without restriction, including without limitation the rights
 *  to use, copy, modify, merge, publish, distribute, sublicense, and/or sell
 *  copies of the Software, and to permit persons to whom the Software is furnished
 *  to do so, subject to the following conditions:
 *  
 *  The above copyright notice and this permission notice shall be included in all
 *  copies or substantial portions of the Software.
 *  
 *  THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR
 *  IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY,
 *  FITNESS FOR A PARTICULAR PURPOSE AND NON INFRINGEMENT. IN NO EVENT SHALL THE
 *  AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER
 *  LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM,
 *  OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN
 *  THE SOFTWARE.
 */

declare(strict_types=1);

namespace BaksDev\Moysklad\Security;

use BaksDev\Menu\Admin\Command\Upgrade\MenuAdminInterface;
use BaksDev\Menu\Admin\Type\SectionGroup\Group\Collection\MenuAdminSectionGroupCollectionInterface;
use BaksDev\Menu\Admin\Type\SectionGroup\Group\MenuGroupSettings;
use Symfony\Component\DependencyInjection\Attribute\AutoconfigureTag;

/**
 * Класс добавляет не кликабельную ссылку модуля (заголовок) в выпадающий список
 */
#[AutoconfigureTag('baks.menu.admin')]
final class Header implements MenuAdminInterface
{
    public function getRole(): string
    {
        return Role::ROLE;
    }

    public function getPath(): ?string
    {
        return null;
    }

    /**
     * Метод возвращает секцию, в которую помещается ссылка на раздел
     */
    public function getGroupMenu(): MenuAdminSectionGroupCollectionInterface|bool
    {
        return new MenuGroupSettings();
    }

    /**
     * Метод возвращает позицию, в которую располагается ссылка в секции меню
     */
    public function getSortMenu(): int
    {
        return 460;
    }

    /**
     * Метод возвращает флаг "Показать в выпадающем меню"
     */
    public function getDropdownMenu(): bool
    {
        return true;
    }


    /**
     * Метод возвращает флаг "Модальное окно" (клик по ссылке вызывает модальное окно, вместо редиректа).
     */
    public function getModal(): bool
    {
        return false;
    }

}
