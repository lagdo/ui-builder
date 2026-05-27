<?php

namespace Lagdo\UiBuilder\Component\Attr;

enum AlertEnum: string
{
    case INFO = 'info';

    case SUCCESS = 'success';

    case WARNING = 'warning';

    case DANGER = 'danger';
}
