# Filtro Profesores del Curso para Moodle 4+
**Repositorio:** `moodle-filter_courseprofesores`

Un plugin de filtro para Moodle que reemplaza la etiqueta `{courseprofesores}` con una lista visualmente atractiva de los Profesores del curso, agrupados por rol. Cada tarjeta de profesores muestra su avatar, un enlace directo a su perfil y un enlace para enviar mensajes.

## Características

- **Agrupados por rol**: Los profesores se organizan según su rol (Profesor editor, Profesor, Gestor)
- **Visualización de avatar**: Muestra la foto de perfil de cada profesor
- **Enlace al perfil**: Enlace directo a la página de perfil de cada profesor
- **Enlace de mensajería**: Enlace directo para enviar un mensaje a través del sistema de mensajería de Moodle
- **Enlace a participantes**: Enlace a la lista completa de participantes del curso
- **Basado en roles**: Solo muestra usuarios con roles de enseñanza (profesor editor, profesor, gestor)
- **Consciente del contexto**: Recurre a contextos superiores si no se encuentran profesores a nivel de curso
- **Cumplimiento de privacidad**: No almacena datos personales (compatible con RGPD)
- **Bilingüe**: Soporte en inglés y español

## Cómo funciona

Simplemente escribe `{courseprofesores}` en cualquier parte del contenido de tu curso (página, etiqueta, resumen de sección, etc.) y el filtro lo reemplazará con una lista de todos los profesores del curso.

## Instalación

1. Descarga el plugin o clónalo desde el repositorio:
   ```bash
   git clone https://github.com/dronix69/moodle-filter_courseprofesores.git courseprofesores
   ```

2. Coloca la carpeta `courseprofesores` en el directorio `filter` de tu Moodle:
   ```
   /ruta/a/moodle/filter/courseprofesores/
   ```

2. Inicia sesión en Moodle como administrador.

3. Ve a **Administración del sitio > Notificaciones** para completar la instalación.

4. Ve a **Administración del sitio > Extensiones > Filtros > Gestionar filtros**.

5. Activa el filtro "Profesores del Curso".

6. Opcionalmente, configura los ajustes en **Administración del sitio > Extensiones > Filtros > Profesores del Curso**.

## Uso

### Uso básico

Coloca la etiqueta en cualquier parte del contenido de tu curso:

```
{courseprofesores}
```

### Ejemplo: Página de bienvenida

```
¡Bienvenido a {coursefullname}!

Tus profesores para este curso son:

{courseprofesores}

Si tienes alguna pregunta, no dudes en contactarlos directamente a través del enlace de mensaje.
```

### Ejemplo: Descripción del curso

```
{courseprofesores}

---
Haz clic en el nombre de cualquier profesor para ver su perfil completo, o usa el botón de mensaje para contactarlos directamente.
```

## Estructura de salida

El filtro genera HTML con la siguiente estructura:

```html
<div class="filter-courseprofesores-container">
    <div class="profesores-role-group">
        <h4 class="profesores-role-title">Profesor editor</h4>
        <div class="profesores-list">
            <div class="profesor-card">
                <div class="profesor-avatar">
                    <a href="/user/view.php?id=X&course=Y">
                        <img src="..." class="userpicture" />
                    </a>
                </div>
                <div class="profesor-info">
                    <a href="/user/view.php?id=X&course=Y" class="profesor-name">Nombre Completo</a>
                    <div class="profesor-details">Departamento, Institución</div>
                    <div class="profesor-actions">
                        <a href="/message/index.php?id=X" class="profesor-action-link message-link">
                            Enviar mensaje
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="profesores-footer">
        <a href="/user/index.php?id=Y" class="participants-link">
            Ver todos los participantes
        </a>
    </div>
</div>
```

## Clases CSS para personalización

| Clase | Descripción |
|-------|-------------|
| `.filter-courseprofesores-container` | Contenedor principal |
| `.profesores-role-group` | Contenedor de cada grupo de rol |
| `.profesores-role-title` | Título del rol |
| `.profesores-list` | Lista de profesores dentro de un rol |
| `.profesor-card` | Tarjeta individual de profesor |
| `.profesor-avatar` | Contenedor del avatar |
| `.profesor-info` | Contenedor de detalles del profesor |
| `.profesor-name` | Enlace al nombre del profesor |
| `.profesor-details` | Información de departamento/institución |
| `.profesor-actions` | Contenedor de enlaces de acción |
| `.message-link` | Enlace de mensaje |
| `.profesores-footer` | Pie con enlace a participantes |
| `.participants-link` | Enlace a la página de participantes |

## Seguridad y privacidad

- Todos los datos de usuario se sanitizan usando las funciones integradas de Moodle
- Solo muestra profesores que el usuario actual tiene permiso para ver
- Respeta la configuración de privacidad de mensajería de Moodle (`can_message_user()`)
- No almacena datos personales (compatible con RGPD mediante `null_provider`)
- Los usuarios eliminados se excluyen automáticamente
- Usa el sistema de capacidades de Moodle para la visibilidad del enlace de participantes

## Requisitos

- Moodle 4.0 o superior
- PHP 8.0 o superior

## Licencia

Este plugin es software libre: puedes redistribuirlo y/o modificarlo bajo los términos de la Licencia Pública General GNU publicada por la Free Software Foundation, ya sea la versión 3 de la Licencia, o (a tu elección) cualquier versión posterior.

---
**Repositorio oficial:** [moodle-filter_courseprofesores](https://github.com/dronix69/moodle-filter_courseprofesores)
