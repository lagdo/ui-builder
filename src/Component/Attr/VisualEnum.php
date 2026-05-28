<?php

namespace Lagdo\UiBuilder\Component\Attr;

enum VisualEnum: string
{
    case DEFAULT = 'default';

    case PRIMARY = 'primary';

    case SECONDARY = 'secondary';

    // The following values are the same as in LevelEnum.
    case INFO = 'info';

    case SUCCESS = 'success';

    case WARNING = 'warning';

    case DANGER = 'danger';
}
