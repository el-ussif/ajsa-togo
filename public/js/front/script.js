// Navigation mobile toggle
document.addEventListener("DOMContentLoaded", () => {
    const navToggle = document.getElementById("nav-toggle")
    const navMenu = document.getElementById("nav-menu")

    if (navToggle && navMenu) {
        navToggle.addEventListener("click", () => {
            navMenu.classList.toggle("active")
            navToggle.classList.toggle("active")
        })

        // Fermer le menu quand on clique sur un lien
        const navLinks = document.querySelectorAll(".nav-link")
        navLinks.forEach((link) => {
            link.addEventListener("click", () => {
                navMenu.classList.remove("active")
                navToggle.classList.remove("active")
            })
        })
    }

    // Animation au scroll
    const observerOptions = {
        threshold: 0.1,
        rootMargin: "0px 0px -50px 0px",
    }

    const observer = new IntersectionObserver((entries) => {
        entries.forEach((entry) => {
            if (entry.isIntersecting) {
                entry.target.style.opacity = "1"
                entry.target.style.transform = "translateY(0)"
            }
        })
    }, observerOptions)

    // Observer les éléments à animer
    const animatedElements = document.querySelectorAll(".stat-card, .project-card, .objective-card, .news-card")
    animatedElements.forEach((el) => {
        el.style.opacity = "0"
        el.style.transform = "translateY(30px)"
        el.style.transition = "opacity 0.6s ease, transform 0.6s ease"
        observer.observe(el)
    })

    // Compteur animé pour les statistiques
    const statNumbers = document.querySelectorAll(".stat-number")
    const animateCounter = (element) => {
        const target = Number.parseInt(element.textContent.replace(/\D/g, ""))
        const increment = target / 100
        let current = 0

        const timer = setInterval(() => {
            current += increment
            if (current >= target) {
                current = target
                clearInterval(timer)
            }

            const suffix = element.textContent.includes("+") ? "+" : element.textContent.includes("%") ? "%" : ""
            element.textContent = Math.floor(current) + suffix
        }, 20)
    }

    // Observer pour les compteurs
    const counterObserver = new IntersectionObserver(
        (entries) => {
            entries.forEach((entry) => {
                if (entry.isIntersecting) {
                    animateCounter(entry.target)
                    counterObserver.unobserve(entry.target)
                }
            })
        },
        { threshold: 0.5 },
    )

    statNumbers.forEach((stat) => {
        counterObserver.observe(stat)
    })

    // Scroll to top button
    const scrollTopBtn = document.createElement("button")
    scrollTopBtn.innerHTML = '<i class="fas fa-arrow-up"></i>'
    scrollTopBtn.className = "scroll-top-btn"
    scrollTopBtn.style.cssText = `
        position: fixed;
        bottom: 20px;
        right: 20px;
        width: 50px;
        height: 50px;
        background: #16a34a;
        color: white;
        border: none;
        border-radius: 50%;
        cursor: pointer;
        opacity: 0;
        visibility: hidden;
        transition: all 0.3s;
        z-index: 1000;
        box-shadow: 0 4px 12px rgba(0,0,0,0.15);
    `

    document.body.appendChild(scrollTopBtn)

    window.addEventListener("scroll", () => {
        if (window.pageYOffset > 300) {
            scrollTopBtn.style.opacity = "1"
            scrollTopBtn.style.visibility = "visible"
        } else {
            scrollTopBtn.style.opacity = "0"
            scrollTopBtn.style.visibility = "hidden"
        }
    })

    scrollTopBtn.addEventListener("click", () => {
        window.scrollTo({
            top: 0,
            behavior: "smooth",
        })
    })
})
