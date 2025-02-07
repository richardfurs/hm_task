export const useUserId = () => {
    const currentCookie = useCookie('userId');
  
    if (!currentCookie.value) {
      const id = Math.random().toString(36).substring(2, 12);
  
      const userCookie = useCookie('userId', {
        maxAge: 86400, // 24 hours
      });
  
      userCookie.value = id;
      return userCookie.value;
    }
  
    return currentCookie.value;
  };
  
  export const usePageInfo = () => {
    const url = useRequestURL();
    const pageUrl = url.href;
  
    const now = new Date();
    const dateTime = new Intl.DateTimeFormat('en-CA', {
      year: 'numeric',
      month: '2-digit',
      day: '2-digit',
      hour: '2-digit',
      minute: '2-digit',
      second: '2-digit',
      hour12: false,
    }).format(now);
  
    return { pageUrl, dateTime };
  };
  