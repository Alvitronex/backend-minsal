* **`AGENTS.md`**:
```markdown
# AGENTS.md - Registro de Asistencia de IA y Criterios Técnicos

## 1. Alcance de la Asistencia con IA
Se empleó el asistente de IA para optimizar tiempos de scaffolding y estructuración inicial:
- Generación de migraciones con soft delete y estructura del modelo Tareas.
- Definición de la expresión regular para la detección de la palabra "urgente" insensible a mayúsculas/minúsculas.
- Configuración de `<TransitionGroup>` en Vue 3 para aislar la animación de salida en el elemento eliminado.

## 2. Decisiones Técnicas y Criterios de Implementación
- **RF-02 (Precedencia de Backend):** La regla de negocio se ejecuta de forma estricta en el servidor mediante `preg_match('/urgente/i', $request->titulo)`, anulando cualquier prioridad enviada por el cliente.
- **RF-03 (Validación de Fecha Límite):** Doble capa de validación. En frontend mediante `:min` dinámico y en backend comparando con `Carbon::today()`, respondiendo con código HTTP 400 Bad Request si la fecha es anterior a hoy.
- **RF-05 (Soft Deletes):** Se implementó el trait `SoftDeletes` en el modelo Eloquent para garantizar la integridad histórica de datos sin borrado físico.
- **RF-06 (Animaciones Aisladas):** Se utilizó `.fade-tarea-leave-active` sobre elementos individuales vinculados a su ID única, evitando re-renderizados innecesarios del listado completo.