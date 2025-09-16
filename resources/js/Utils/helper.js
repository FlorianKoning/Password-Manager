export function closeNotification(notificationId) {
    const notification = document.getElementById(notificationId);

    if (notification) {
        notification.classList.remove('animate-slide-in');
        setTimeout(() => notification.remove(), 500);
    }
}